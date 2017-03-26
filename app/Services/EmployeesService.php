<?php

class EmployeesService implements EmployeesInterface {

	public function __construct(Employee $employee)
	{
		$this->employee = $employee;
	}

	public function getHomePageData()
	{

	}
	
}