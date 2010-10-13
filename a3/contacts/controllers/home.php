<?php
/**
 * example of a page or set of pages that require login
 */
class Home extends Controller {
	public function execute() {
		# $ldata has the user record
		# you can use this info to fine tune the response logic
		# in this case we accept any valid login, if not we display the login form
		$ldata = Login::check();
		if (!is_array($ldata)) {
			View::display('tools/login.tpl');
			return;
		}
		$id = $ldata['login'];
		$u = new Users;
		$c = new Contacts;
		# in this section we handle sharing information
		# we can share or unshare information with one of our contacts
		# for any contact we have agreed to share information with we can
		# also get their list of contacts
		if ($this->actions[1] == 'sharer') {
			$cid = $_REQUEST['contact_email'];
			$ckey = array('email'=>$id, 'contact_email'=>$cid);
			switch($this->actions[2]) {
			case 'share':
				$c->upd($ckey, array('shared'=>1));
				break;
			case 'unshare':
				$c->upd($ckey, array('shared'=>0));
				break;
			# for a given sharer show their contacts
			case 'showcontacts':
				View::assign('sharer',$cid);
				View::assign('sharedcontacts',$c->sharedcontacts($cid,$id));
				View::display('sharedcontacts.tpl');
				return;
			default:
			}
		# in this section we manage our own contacts
		# including showing contact details
		} else if ($this->actions[1] == 'contact') {
			$cid = $_REQUEST['contact_email'];
			switch($this->actions[2]) {
			case 'show':
				$contact = $u->getone($cid);
				unset($contact['password']);
				View::assign('contact',$contact);
				View::display('contactshow.tpl');
				return;
			case 'add':
				$this->hidden = array('action[]'=>'contact');
				$this->schema = $c->schema;
				$this->schema['shared']['hide'] = true;
				$this->schema['email']['auto'] = true;
				$this->schema['email']['alt'] = $id;
				View::display('contact.tpl');
				return;
			case 'save':
				# avoid foreign key errors
				$u->ins(array('email'=>$cid));
				$c->ins(array('email'=>$id,'contact_email'=>$cid));
				break;
			case 'confirmdelete':
				View::assign(
					'confirm',
					"Really delete contact ".
					htmlentities($cid)."?"
				);
				View::assign('action','home/contact/delete');
				View::assign('submit','delete');
				View::display('tools/confirm.tpl');
				return;
			case 'delete':
				$c->del(array('email'=>$id,'contact_email'=>$cid));
				$topmsg = "contact ".htmlentities($cid)." deleted";
				break;
			default:
			}
		# in this one we manage our own information
		# we can delete ourselves - which will automatically cascade 
		# to the contacts table based on foreign keys
		} else if ($this->actions[1] == 'user') {
			switch($this->actions[2]) {
			case 'changepassword':
				if ($this->actions[3] == 'save') {
					if (($encodedpw = Login::getpw()) === false) {
						View::assign('errors',implode("<br>\n",Login::err()));
						$topmsg = "password not updated";
						break;
					} 
					$u->upd($id,array('password' => $encodedpw));
					$topmsg = "updated password";
					break;
				} 
				View::display('changepassword.tpl');
				return;
			case 'save':
				$u->upd($id,$_REQUEST);
				$topmsg = "saved info for $id";
				break;
			case 'confirmdelete':
				View::assign('confirm','Really delete myself???');
				View::assign('action','home/user/delete');
				View::assign('submit','delete');
				View::display('tools/confirm.tpl');
				return;
			case 'delete':
				Login::logout();
				$u->del($id);
				$topmsg = "you no longer exist";
				View::display("tools/login.tpl");
				return;
			default:
			}
		}
		$this->input = $u->getone($id);
		$this->hidden = array('action[]'=>'user');
		$this->schema = $u->schema;
		# the change password link
		$this->schema['password']['template'] = 'pwlink.tpl';
		View::addCSS('home.css');
		View::assign('contacts',$c->getcontacts($id));
		View::assign('sharers',$c->getsharers($id));
		View::assign('topmsg',$topmsg);
		View::display('home.tpl');
	}
}

