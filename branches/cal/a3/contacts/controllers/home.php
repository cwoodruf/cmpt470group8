<?php
/**
 * example of a page or set of pages that require login
 */
class Home extends Controller {
	public function execute() {

		# $ldata has the user record
		# you can use this info to fine tune the response logic
		# in this case we accept any valid login, if not we display the login form
		if ($ldata = Login::check()) {
			$id = $ldata['login'];
			$u = new Users;
			$c = new Contacts;
			if ($this->actions[1] == 'contact') {
				switch($this->actions[2]) {
				case 'show':
					$contact = $u->getone($_REQUEST['contact_email']);
					unset($contact['password']);
					View::assign('contact',$contact);
					View::display('contactshow.tpl');
					return;
				case 'add':
					$this->hidden = array('action[]'=>'contact');
					$this->schema = $c->schema;
					$this->schema['email']['auto'] = true;
					$this->schema['email']['alt'] = $id;
					View::display('contact.tpl');
					return;
				case 'save':
					# avoid foreign key errors
					$u->ins(array('email'=>$_REQUEST['contact_email']));
					$c->ins(array('email'=>$id,'contact_email'=>$_REQUEST['contact_email']));
					break;
				case 'confirmdelete':
					View::assign(
						'confirm',
						"Really delete contact ".
						htmlentities($_REQUEST['contact_email'])."?"
					);
					View::assign('action','home/contact/delete');
					View::assign('submit','delete');
					View::display('tools/confirm.tpl');
					return;
				case 'delete':
					$c->del(array('email'=>$id,'contact_email'=>$_REQUEST['contact_email']));
					$topmsg = "contact ".htmlentities($_REQUEST['contact_email'])." deleted";
					break;
				default:
				}
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
			$this->schema['password']['template'] = 'pwlink.tpl';
			View::addCSS('home.css');
			View::assign('contacts',$c->getall(
					array("where email='%s' order by contact_email",$id),
					"contact_email"
				)
			);
			View::assign('topmsg',$topmsg);
			View::display('home.tpl');
		} else {
			View::display('tools/login.tpl');
		}
	}
}

