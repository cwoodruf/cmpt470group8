<?php
/**
 * default controller - customize it
 */
class Home extends Controller {
	public function execute() {
		/*
		 * you can use the $this->actions array to select which action you want to do
                 * use $this->doable(array( ...map of action to callback funcs...));
                 * and $this->doaction($this->actions[1]);
                 * to handle sub actions such as home/someaction
		 */
	}
}

