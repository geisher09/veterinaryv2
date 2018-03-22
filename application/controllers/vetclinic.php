<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vetclinic extends CI_Controller {

	public $sdate =	 "2017-10-01";
	public $edate = "2017-10-20";

	public function __construct(){
		parent::__construct();
		
			date_default_timezone_set('Asia/Manila');
			$this->load->model('vet_model','vet_model');
			$this->load->model('itemstock','itemstock');
			$this->load->model('history','history');
			$this->load->model('services','services');
			$this->load->model('itemhistory','itemhistory');
			$dat = $this->vet_model->saveDates();
			$GLOBALS['datestart'] = $dat['start'];
			$GLOBALS['dateend'] = $dat['end'];
			$GLOBALS['startDate'] = date('Y-m-d',strtotime('October 6, 2017'));//$startDate and $endDate == range of dates;
			$GLOBALS['dates'] = $GLOBALS['startDate'];
			$GLOBALS['endDate'] = date('Y-m-d',strtotime('October 19, 2017'));
			// $GLOBALS['startDate'] = date('Y-m-d',strtotime('October 6, 2017'));//$startDate and $endDate == range of dates;
			// $GLOBALS['dates'] = $GLOBALS['startDate'];
			// $GLOBALS['endDate'] = date('Y-m-d',strtotime('October 19, 2017'));
	}
	public function index()
	{
		$header_data['title'] = "Dashboard";		
				$record_data['bills'] = $this->vet_model->getbill();

		$this->load->model('vet_model');
		$clients = $this->vet_model->getClients();
		$stocks = $this->vet_model->getStocks();
		$lastclient = $this->vet_model->getLastClient();
		$sales_data['items']=$this->vet_model->getTotalSalesSum();
		$sales_data['items2']=$this->vet_model->getTotalSalesSumYesterday();
		$sales_data['visits']=$this->vet_model->getTotalSalesSum2();
		$sales_data['visits2']=$this->vet_model->getTotalSalesSumYesterday2();
		$sales_data['patients']=$this->vet_model->getTotalPatients();
		$sales_data['no_ofItems']=$this->vet_model->getAllitems();
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();
		$record_data['zero'] = $this->vet_model->countgetAllZeroitems();	
		$this->load->view('include/header2',$header_data);
		$this->load->view('clinic/dashboard', ['record_dat'=>$record_data,'sales_dat'=>$sales_data]);			
		//$this->load->view('include/footer');
	}

	public function accountsettings()
	{
		$header_data['title'] = "Account Settings";		
		
		$this->load->model('vet_model');
		$clients = $this->vet_model->getClients();
		$stocks = $this->vet_model->getStocks();
		$lastclient = $this->vet_model->getLastClient();
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();	
		$this->load->view('include/header2',$header_data);
		$this->load->view('clinic/accountsettings', ['record_dat'=>$record_data]);			
		//$this->load->view('include/footer');
	}

	public function salesreport()
	{
		$header_data['title'] = "Sales Report";		
				$record_data['bills'] = $this->vet_model->getbill();

		$this->load->model('vet_model');
		$clients = $this->vet_model->getClients();
		$stocks = $this->vet_model->getStocks();
		$lastclient = $this->vet_model->getLastClient();
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();	
		$this->load->view('include/header2',$header_data);
		$this->load->view('clinic/salesrep', ['record_dat'=>$record_data]);			
		//$this->load->view('include/footer');
	}

	public function changepassword()
	{
		$header_data['title'] = "Change Password";		
		
		$this->load->model('vet_model');
		$clients = $this->vet_model->getClients();
		$stocks = $this->vet_model->getStocks();
		$lastclient = $this->vet_model->getLastClient();
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();	
		$this->load->view('include/header2',$header_data);
		$this->load->view('clinic/changepassword', ['record_dat'=>$record_data]);			
		//$this->load->view('include/footer');
	}

	public function adduser()
	{
		$header_data['title'] = "Add New User";		
		
		$this->load->model('vet_model');
		$clients = $this->vet_model->getClients();
		$stocks = $this->vet_model->getStocks();
		$lastclient = $this->vet_model->getLastClient();
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();	
		$this->load->view('include/header2',$header_data);
		$this->load->view('clinic/adduser', ['record_dat'=>$record_data]);			
		//$this->load->view('include/footer');
	}

	public function records()
	{
		$header_data['title'] = "Records";		
				$record_data['bills'] = $this->vet_model->getbill();

		$this->load->model('vet_model');
		$clients = $this->vet_model->getClients();
		$stocks = $this->vet_model->getStocks();
		$lastclient = $this->vet_model->getLastClient();
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();	
		$this->load->view('include/header2',$header_data);
		$this->load->view('clinic/records', ['cl'=>$clients,'al'=>$lastclient,'stock'=>$stocks,'record_dat'=>$record_data]);			
		//$this->load->view('include/footer');
	}

	public function ItemPrice(){
		$dat=array('item_id'=>$this->input->post('id'),
			'item_qty'=>$this->input->post('qty'));
		$item = $this->vet_model->menus($dat);
	
				
				// $i=int($i);
		
		// // $items = $this->vet_model->myItem($this->input->post('id'));
		 echo json_encode($item);



	}

	public function ajax_list()
	{
		$this->load->model('vet_model');
		$client = $this->vet_model->get_by_id($this->input->post('id'));
		$pet = $this->vet_model->getpet_by_id($this->input->post('id'));
		$visit = $this->vet_model->getvisit_by_id($this->input->post('id'));
		$pets = $this->vet_model->getOwnpets($this->input->post('id'));
		$visits = $this->vet_model->getOwnvisits($this->input->post('id'));
		$items = $this->vet_model->getItems($this->input->post('id'));
		$vets = $this->vet_model->getVets($this->input->post('id'));
		$allitems= $this->vet_model->getAllitems($this->input->post('id'));
		$treatments = $this->vet_model->getServices($this->input->post('id'));
		$grooms = $this->vet_model->getGrooms($this->input->post('id'));
		$units = $this->vet_model->getUnits();
		$types = $this->vet_model->getItemtype();
		$suppliers = $this->vet_model->getSupplier();
		$output = array(
						"client" => $client,
						"pet" => $pet,
						"pets" => $pets,
						"visits" => $visits,
						"visit" => $visit,
						"items" => $items,
						"vets" => $vets,
						"allitems" => $allitems,
						"treatments" => $treatments,
						"grooms" => $grooms,
						"units" => $units,
						"types" => $types,
						"suppliers" => $suppliers

				);
		echo json_encode($output);

	}

	public function ajax_getVisits(){
		$visit = $this->vet_model->getvisit_by_id($this->input->post('id'));
		$output = array('visit'=>$visit);
		echo json_encode($output);
	}
	public function filter_date()
	{
		$datestart = date("Y-m-d", strtotime("-6 days"));
		$dateend = date("Y-m-d");

		$startDate = $this->input->post('startDate') == "" ? $datestart : $this->input->post('startDate');
		$dates[] = $startDate; 									 
		$endDate = $this->input->post('endDate') == "" ? $dateend : $this->input->post('endDate');								
		$i = 0;
		$d = '';
		while(strcmp($d, $endDate) != 0){ //loop to get dates in the range given
			$d = date('Y-m-d',strtotime('+1 day', strtotime($dates[$i])));
			$dates[] = $d;
			++$i;
		}

		foreach($dates as $d){ //loop to get sum per date
			$sales1[] = $this->vet_model->getSalesSum($d);
			$sales2[] = $this->vet_model->getSalesSum2($d);
		}
		$sales = array_merge($sales1, $sales2);
		$output = array(
						"sales1" => $sales1,
						"sales2" => $sales2,
						"sales" => $sales,
						"dates" => $dates

				);
		echo json_encode($output);
	}

	public function ajax_yearly(){
		$year=date('Y');
		for($month=1;$month<=12;$month++){
			$sales1[] = $this->vet_model->getSalesSumPerMonth($month,$year);
			$sales2[] = $this->vet_model->getSalesSumPerMonth2($month,$year);
			$dates[] = date('F',mktime(0,0,0,$month));	
		}
		
		$output = array(
			"sales1" => $sales1,
			"sales2" => $sales2,
			"dates" => $dates
		);
		echo json_encode($output);
	}
	
	public function services(){
				$record_data['bills'] = $this->vet_model->getbill();

		if(isset($_POST['add'])){
			
			$desc = $_POST['desc'];
			$type = $_POST['serv_type'];
			$data = array(
					'id'=>null,
					'desc'=>$desc,
					'type'=>$type,
					);
			$this->services->create($data);
		}
		if(isset($_POST['update'])){
			$id = $_POST['serviceid'];
			$desc = $_POST['desc'];
			$type = $_POST['serv_type'];
			$data = array(
						'desc'=>$desc,
						'type'=>$type
					);
			$condition = array('id'=>$id);
			
			$this->services->update($data,$condition);
			// $this->load->view('clinic/vet_home', ['cl'=>$clients,'al'=>$lastclient]);


		}
		if(isset($_GET['id'])){
			$data=array('id'=>$_GET['id']);
			$this->services->del($data);
		}
		$header_data['title'] = "Services Offered";
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();
		$condition = array('type'=>'Grooming');
		$data['grooming'] = $this->services->read($condition);
		$condition = array('type'=>'Treatment');
		$data['treatment'] = $this->services->read($condition);
		$header_data['notif']=$this->vet_model->notification();


		$this->load->view('include/header2',$header_data);
		$this->load->view('clinic/services',['data'=>$data,'record_dat'=>$record_data]);
		$this->load->view('include/footer');
	}// end of services function


	
	
	
	//chrstnv
	public function save(){
		$lastclient = $this->vet_model->getLastClient();
		$finalid = $lastclient+1;
		$data = $this->input->post(['cname','address','contactno','email']);
    
		if (($this->vet_model->saveClients($data,$finalid))&&($this->vet_model->savePets($finalid))){
            		$this->session->set_flashdata('response', 'Saved Succesfully!');
				 }
				 return redirect('vetclinic/records');

	}
	public function validateClient(){

	
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
	  		$this->form_validation->set_rules('address', 'address', 'trim|required');
		 	$this->form_validation->set_rules('contact', 'contact', 'trim|required|min_length[11]|max_length[11]');
		  	$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		  	$this->form_validation->set_rules('petname', 'Pet Name', 'trim|required');
	  		$this->form_validation->set_rules('petbreed', 'breed', 'trim|required');
		 	// $this->form_validation->set_rules('petmarkings', 'markings', 'required');
		 	$this->form_validation->set_rules('petspecies', 'species', 'trim|required');
		   $this->form_validation->set_rules('petbirthday', 'Birthday', 'trim|required');
            
            if ($this->form_validation->run()){

    //          	$data = $this->input->post(['cname','address','contactno','email']);
    //          	$this->load->model('vet_model');
    //          	if (($this->vet_model->saveClients($data,$finalid))&&($this->vet_model->savePets($finalid))){
    //          		$this->session->set_flashdata('response', 'Saved Succesfully!');
				//  }
				//  else{
    //          		// $this->session->set_flashdata('response', 'Failed to save!');
				//  }
				// 
				echo true;

            }
            else{
    

            if(form_error('name')!=null){$data['name']=form_error('name');}
             if(form_error('address')!=null){$data['address']=form_error('address');}
              if(form_error('contact')!=null){$data['contact']=form_error('contact');}
               if(form_error('email')!=null){$data['email']=form_error('email');}
                if(form_error('petname')!=null){$data['petname']=form_error('petname');}
                 if(form_error('petbreed')!=null){$data['petbreed']=form_error('petbreed');}
                  if(form_error('petspecies')!=null){$data['petspecies']=form_error('petspecies');}
                   if(form_error('petbirthday')!=null){$data['petbirthday']=form_error('petbirthday');}
           		echo json_encode($data); 
                }
		}

	public function savedate(){

		$this->load->model('vet_model');

		$start = $this->input->post('startdate');
		$end = $this->input->post('enddate');
		//$this->load->view('clinic/saleschart');
		return [$start,$end];
	}

	public function savepet(){

		$this->load->model('vet_model');
		$id = $this->input->post('addpetclientno');


		$lastpet = $this->vet_model->getLastpet($id);
		$lpetid = $lastpet+1;

		 // echo $lpetid;

			
            
             	$this->load->model('vet_model');
             	if (($this->vet_model->saveAddPet($lpetid))){
             		$this->session->set_flashdata('response', 'Saved Succesfully!');
				 }
				 else{
             		//$this->session->set_flashdata('response', 'Failed :(');
				 }
				return redirect('vetclinic/records');

         

            




	}
	//chrstnv 


	//bawas item 
	public function itemUsed(){
		
			
			 print_r($data);
			// date_default_timezone_set('Asia/Manila');
			// $date=date('Y-m-d H:i:s');
			// $pet=$this->input->post('pet');
			// $yr=date('y');
			// $petv=$this->vet_model->getLastpetvisit();
			// $petv=$petv+1;
			//  $id = $yr.'-'.$pet.'-'.$petv;

			// $this->vet_model->addItemUsed($data['id'],$data['item']);
			// $item=$this->vet_model->itemUsage($data);
			// //to transaction

			// 	$details=$this->vet_model->myItem($data['id']);
			// 	$prd = $data['item']*$details[0]['item_cost'];
				
			// 	$input = array('itemid'=>$data['id'],
			// 					'action'=>'Sold Item',
			// 					'description'=>'Sold Item: Item '.$details[0]['itemid'].'-'.$details[0]['item_desc'].' sold '.$data['item'].' pc/s with total cost of '.$prd. ' only '.$details[0]['qty_left']. ' pc/s left',
			// 					'qty'=>$data['item'],
			// 					'total_cost'=>$prd);
			// 	$this->itemhistory->create($input);
		// print_r($notif);
	}

	public function savehistory(){
			$header_data['notif']=$this->vet_model->notification();
			$header_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
			$header_data['eventCounter'] = count($header_data['events']);
			$header_data['items'] = $this->vet_model->getAllZeroitems();

			$this->form_validation->set_rules('findings', 'Findings', 'required');
	  	// 	$this->form_validation->set_rules('birthday', 'Birthday', 'required');
		 	// $this->form_validation->set_rules('markings', 'Markings', 'required');
	  	// 	$this->form_validation->set_rules('breed', 'Breed', 'required');
		 	// $this->form_validation->set_rules('species', 'Specie', 'required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            
            if ($this->form_validation->run()){
             	$this->load->model('vet_model');
             	if (($this->vet_model->saveHistory())&&($this->vet_model->getLastpetvisit())){
					 $this->session->set_flashdata('response', 'Saved Succesfully!');
					 $this->session->set_userdata('invoice', 'yes');
					 $this->getInvoiceData();
				 }
				 else{
             		//$this->session->set_flashdata('response', 'Failed :(');
				 }
				return redirect('vetclinic/records');

            }

            else{
            	$this->session->set_flashdata('responsed', 'Failed to save! (Please input necessary details)');
            	$header_data['title'] = "Clinic";		
				$this->load->view('include/header2',$header_data);
				$this->load->model('vet_model');
				$clients = $this->vet_model->getClients();
				$lastclient = $this->vet_model->getLastClient();	
				$this->load->view('clinic/records', ['cl'=>$clients,'al'=>$lastclient,'record_dat'=>$header_data]);
				$this->load->view('include/footer');
            }

	}

	public function savenewitem(){

             	$this->load->model('vet_model');
             	$this->vet_model->saveNewItem();
             	$this->vet_model->saveItemInstance();
             	$this->vet_model->saveItemHistory();
             	$this->session->set_flashdata('response', 'Saved Succesfully hehe!');
				
				return redirect('vetclinic/inventory');

           

	}

	public function addstock($id){
		$header_data['title']="Add new stocks";
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();
		$record_data['bills'] = $this->vet_model->getbill();
		$item_data['details'] = $this->vet_model->getitemdetails($id);
		$purchase_data['data'] = $this->vet_model->getitempurchase($id);
		$this->load->view('include/header2',$header_data);
		$this->load->model('vet_model','schedule');
		$this->load->view('clinic/addstock',['record_dat'=>$record_data,'item_dat'=>$item_data,'purchase_dat'=>$purchase_data]);
		$this->load->view('include/footer');
	}

	public function savenewpurchase($id){
			$newid=$id;
			$this->form_validation->set_rules('exp_date', 'Date', 'required');
	  		$this->form_validation->set_rules('item_cost', 'Cost', 'required');
		 	$this->form_validation->set_rules('qty_left', 'Quantity', 'required');
			// $this->form_validation->set_rules('exp_date', 'Expiration Date', 'regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]'); 
			// $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            
            if ($this->form_validation->run()){
             	$this->load->model('vet_model');
             	$this->vet_model->saveNewPurchase($newid);
             	$this->vet_model->saveNewPurchaseHistory($newid);

				return redirect('/vetclinic/addstock/'.$newid.'');

            }

            else{
            	$this->session->set_flashdata('responsed', 'Failed to save! (Please input necessary details)');
				$header_data['title'] = "Inventory";
				$this->load->view('include/header2',$header_data);
				$data['stock'] = $this->itemstock->read();
				$data['itemhistory']=$this->itemhistory->read();
				$record_data['notif']=$this->vet_model->notification();
				$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
				$record_data['eventCounter'] = count($record_data['events']);
				$record_data['items'] = $this->vet_model->getAllZeroitems();
				
				$this->load->view('include/header2',$header_data);
				$this->load->view('clinic/inventory',['data'=>$data,'record_dat'=>$record_data]);

				$this->load->view('include/footer');
            }

	}

	public function history(){
				$data['stock'] = $this->itemstock->read();
				$data['title']='Transactions History';
				$data['itemhistory']=$this->itemhistory->read();
				$data['notif']=$this->vet_model->notification();
				$record_data['notif']=$this->vet_model->notification();
				$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
				$record_data['eventCounter'] = count($record_data['events']);
				$record_data['items'] = $this->vet_model->getAllZeroitems();
			
				$this->load->view('include/header2',$data);
				$this->load->view('clinic/historyview2',['data'=>$data,'record_dat'=>$record_data]);

				$this->load->view('include/footer');
	}

	public function historynew(){
			// print_r($_POST);
		
	  $this->form_validation->set_rules('qty_used', 'Quantity', 'required');
			// // $this->form_validation->set_rules('exp_date', 'Expiration Date', 'regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]'); 
			// // $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
          
        if ($this->form_validation->run()){
            		 
             	$this->load->model('vet_model');
             	//$this->vet_model->subtractitem();
             	$this->vet_model->saveItemSaleHistory();
             		$pet=$this->input->post('pet');
            if(isset($pet)){
             	
             date_default_timezone_set('Asia/Manila');
			$date=date('Y-m-d H:i:s');
			
			$yr=date('y');
			$petv=$this->vet_model->getLastpetvisit();
			$petv=$petv+1;
			$visitid = $yr.'-'.$pet.'-'.$petv;
       			  $data=array('items_used'=>$this->input->post('itemid'),
				'qty'=>$this->input->post('qty_used'),
				'visitid'=>$visitid);
			$this->vet_model->addItemUsed($data);
		}
			//return redirect('vetclinic/historynew');
		
		   	echo true;
            // 	$this->session->set_flashdata('response', 'Saved Succesfully!');
		
			

    
        }

         else{
		
				$data['stock'] = $this->itemstock->read();
				$data['title']='Transactions History';
				$data['itemhistory']=$this->itemhistory->read();
				$data['notif']=$this->vet_model->notification();
				$record_data['notif']=$this->vet_model->notification();
				$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
				$record_data['eventCounter'] = count($record_data['events']);
				$record_data['items'] = $this->vet_model->getAllZeroitems();
			
				$this->load->view('include/header2',$data);
				$this->load->view('clinic/historyview2',['data'=>$data,'record_dat'=>$record_data]);

				$this->load->view('include/footer');

		 }
	}

	public function ajax_edit($id)
	{
			$data = $this->vetclinic->get_by_id($id);
			echo json_encode($data);
	}




	public function schedule()
	{
		$header_data['title'] = "Schedule";
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();
		$record_data['bills'] = $this->vet_model->getbill();

		$doctorData = $this->vet_model->getVets();

		$this->load->view('include/header2',$header_data);
		$this->load->model('vet_model','schedule');
		$this->load->view('clinic/schedule',['record_dat'=>$record_data, 'doctorData'=>$doctorData]);
		$this->load->view('include/footer');

	}

	public function sales()
	{
		$record_data['bills'] = $this->vet_model->getbill();

		$header_data['title'] = "Sales";
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();
		$this->load->view('include/header2',$header_data);
		$this->sdate = "2017-08-02";//$startDate and $endDate == range of dates
		$this->edate = "2017-08-17";								 //$dates == array of dates in the range given
		$this->load->view('clinic/sales',['record_dat'=>$record_data]);
		$this->load->view('include/footer');
		

	}

	public function get_events($vetid)
	 {
	     $start = $this->input->get("start");
	     $end = $this->input->get("end");

	     $startdt = new DateTime('now'); // setup a local datetime
	     $startdt->setTimestamp($start); // Set the date based on timestamp
	     $start_format = $startdt->format('Y-m-d H:i:s');

	     $enddt = new DateTime('now'); // setup a local datetime
	     $enddt->setTimestamp($end); // Set the date based on timestamp
	     $end_format = $enddt->format('Y-m-d H:i:s');

	     $events = $this->vet_model->get_events($start_format, $end_format, $vetid);

	     $data_events = array();

	     foreach($events->result() as $r) {

	         $data_events[] = array(
	             "id" => $r->ID,
	             "title" => $r->title,
	             "description" => $r->description,
	             "end" => $r->enddate,
	             "start" => $r->startdate,
	             "allday" =>$r->allDay
	         );
	     }

	     echo json_encode(array("events" => $data_events));
	     exit();
	 }
	 public function drop(){
	 	$title = $this->input->post("title");
		$startdate = $this->input->post("start");
		$enddate = $this->input->post("end");
		$eventid = $this->input->post("eventid");

		$data = array(
					'title'=>$title,
					'startdate'=>$startdate,
					'enddate'=>$enddate
					);
		$condition = array('id'=>$eventid);
		$update = $this->vet_model->update($data,$condition);

		if($update)
			echo json_encode(array('status'=>'success'));
		else
			echo json_encode(array('status'=>'failed'));
	 }
	 public function edit_event()
     {
          $eventid = intval($this->input->post("eventid"));
          $event = $this->vet_model->get_event($eventid);
          if($event->num_rows() == 0) {
               echo"Invalid Event";
               exit();
          }

          $event->row();

          /* Our vet_model data */
        $name = $this->input->post("name", TRUE);
	    $desc = $this->input->post("description", TRUE);

          $delete = intval($this->input->post("delete"));

          if(!$delete) {

               $this->vet_model->update_event($eventid, array(
                    "title" => $name,
                    "description" => $desc,
                    )
               );

          } else {
               $this->vet_model->delete_event($eventid);
          }

          redirect(site_url("vetclinic/sched"));
     }

      public function add_event() 
	{
	    /* Our calendar data */
	    $name = $this->input->post("name", TRUE);
	    $desc = $this->input->post("description", TRUE);
	    $start_date = $this->input->post("start", TRUE);
		$end_date = $this->input->post("end", TRUE);
		$vetid = $this->input->post("vetid", TRUE);

	    $this->vet_model->add_event(array(
	       "title" => $name,
	       "description" => $desc,
	       "startdate" => $start_date,
	       "enddate" => $end_date,
		   "allDay"=>'false',
		   "vetid" => $vetid
	       )
	    );

	    redirect(site_url("vetclinic/schedule"));
	}
	public function resetdate(){
		$title = $this->input->post("title");
		$startdate = $this->input->post("start");
		$enddate = $this->input->post("end");
		$eventid = $this->input->post("eventid");

		//$update = mysqli_query($con,"UPDATE schedule SET title='$title', startdate = '$startdate', enddate = '$enddate' where id='$eventid'");

		$data = array(
					'title'=>$title,
					'startdate'=>$startdate,
					'enddate'=>$enddate
					);
		$condition = array('id'=>$eventid);
		$update = $this->vet_model->update($data,$condition);

		if($update)
			echo json_encode(array('status'=>'success'));
		else
			echo json_encode(array('status'=>'failed'));
	}



	//chrstnv delete
		public function delete(){

				// print_r($_GET);

				$this->vet_model->deleteItem($this->input->get('itemid'));

				 return redirect('vetclinic/inventory');

		}

		//chrstnv update 
		public function updateItem(){
			
						$data= array('item_desc'=>$this->input->post('itemdesc'),
							'item_type'=>$this->input->post('type'),
							'itemid'=>$this->input->post('itemid'));
						$this->vet_model->updates($data);
							return redirect('vetclinic/inventory');

		
				
	/*	 	print_r($_POST);*/



		}
	public function inventory(){
		$header_data['notif']=$this->vet_model->notification();
		$header_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$header_data['eventCounter'] = count($header_data['events']);
		$header_data['items'] = $this->vet_model->getAllZeroitems();
				$record_data['bills'] = $this->vet_model->getbill();

		if(isset($_POST['item_desc'])){
		
			
			$desc = $this->input->post("item_desc");
			$price = $this->input->post("item_cost");
			
			$data2 = array(
					'itemid'=>null,
					'item_desc'=>$desc,
					'qty_left'=>$qty,
					'item_cost'=>$price
					);
			$this->itemstock->create($data2);
			$last = $this->itemstock->c();
			$data1 = array(
					'itemid'=>$last,
					'qty'=>$qty,
					'action'=>'Add Product',
					'description'=>'Add Product: Item ' .$last .' - '  .$desc .' with ' .$qty . ' pc/s and price of ' .$price .' added ' ,
					'total_cost'=>$price);
		$this->itemhistory->create($data1);
		//print_r($_POST);
		}
		//chrstnv item
		if(isset($_POST['itemuse'])){
			$option = $this->input->post("itemid", TRUE);
			$qty = $this->input->post("qty_used", TRUE);
			$visitid = $this->input->post("additemId", TRUE);
			$validate = array (
				array('field'=>'qty_used','label'=>'left','rules'=>'trim|required|min_length[1]')
			);
			$this->form_validation->set_rules($validate);
			
			$selector = 'item_cost';
			$condition = array('itemid'=>$option);
			$price = $this->itemstock->read($condition,$selector)[0]['item_cost'];
			$selector = 'item_desc';
			$condition = array('itemid'=>$option);
			$desc = $this->itemstock->read($condition,$selector)[0]['item_desc'];
			$selector = 'qty_left';
			$left = $this->itemstock->read($condition,$selector)[0]['qty_left'];
			
			if($qty>$left || $qty<=0){
				echo "<script type='text/javascript'>
				alert('Invalid input');


				;</script>";
				
			}
			else{
			$price = $price*$qty;
			$left = $left-$qty;

			$data = array('qty_left'=>$left);
			$this->itemstock->update($data,$condition);
			$this->vet_model->addItemUsed2($option,$visitid);

			$data = array(
					'itemid'=>$option,
					'qty'=>$qty,
					'action'=>'Sold Item',
					'description'=>'Sold Item: Item '.$option .' - '  .$desc . ' sold ' .$qty .' pc/s with total cost of ' .$price.'. Only ' .$left . ' pc/s left ' ,
					'total_cost'=>$price
					);
			$this->itemhistory->create($data);
			}
		}
		if(isset($_POST['addstock'])){
			
			$option = $this->input->post("itemid", TRUE);
			
			$addedstock = $this->input->post("add_stock", TRUE);
			$validate = array (
				array('field'=>'add_stock','label'=>'left','rules'=>'trim|required|min_length[1]')
			);
			$this->form_validation->set_rules($validate);
			
			$condition = array('itemid'=>$option);
			$selector = 'qty_left';
			$left = $this->itemstock->read($condition,$selector)[0]['qty_left'];
			$selector = 'item_desc';
			$desc = $this->itemstock->read($condition,$selector)[0]['item_desc'];
			$selector = 'item_cost';
			$price = $this->itemstock->read($condition,$selector)[0]['item_cost'];
			if($addedstock<=0){
				echo "<script type='text/javascript'>alert('Invalid Input');</script>";
			}
			else{
			$qty = $addedstock+$left;
			
			 $data = array(
					'itemid'=>$option,
					'qty_left'=>$qty
					);
			$this->itemstock->update($data,$condition);
			$data = array(
					'itemid'=>$option,
					'qty'=>$qty,
		
					'action'=>'Add Stock',
					'description'=>'Add Stock: Item '.$option .' - '.$desc .' added ' .$addedstock.' pc/s',
					'total_cost'=>$price
						);
			$this->itemhistory->create($data);
			}
		 }
		
			

		
		
		$data['stock'] = $this->itemstock->read();
		$data['itemhistory']=$this->itemhistory->read();
		$header_data['title'] = "Inventory";
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();
		
		$this->load->view('include/header2',$header_data);
		$this->load->view('clinic/inventory',['data'=>$data,'record_dat'=>$record_data]);

		$this->load->view('include/footer');
	}
	//chrstnv history
	
	function space($str)
		{
		     if (! preg_match('/^[a-zA-Z\s]+$/',$str)) {	
        $this->form_validation->set_message('space', 'Please input a valid Description');
        return FALSE;
   		 }		

   		  else {
        return TRUE;
    	}
		} 

	//chrstnv
	public function validateItem(){

		// print_r($_POST);
		$this->form_validation->set_rules('desc','Description','required|min_length[2]');
		$this->form_validation->set_rules('cost', 'Cost', 'trim|required');
		$this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'required');

		if($this->form_validation->run()){
			echo true;
		}
		else{
			if(form_error('desc')!=null){
				$data['desc']=form_error('desc');
			}
				if(form_error('cost')!=null){
				$data['cost']=form_error('cost');
			}
				if(form_error('qty')!=null){
				$data['qty']= form_error('qty');
				
			}
				if(form_error('date')!=null){
				$data['date']= form_error('date');
			}
			echo json_encode($data);



		}

	}

	public function validatedit(){

		// print_r($_POST);
		$this->form_validation->set_rules('cost','Cost','required');
		$this->form_validation->set_rules('qty','qty','required');

		$this->form_validation->set_rules('dte','Date','required|min_length[2]');

		if($this->form_validation->run()){
			echo true;
		}
		else{
			if(form_error('cost')!=null){
				$data['cost']=form_error('cost');
			}
			if(form_error('qty')!=null){
				$data['qty']=form_error('qty');
			}
			if(form_error('dte')!=null){
				$data['dte']=form_error('dte');
			}
				
				

				
			echo json_encode($data);
		}

	}
	public function validatedit1(){

		// print_r($_POST);
		$this->form_validation->set_rules('desc','Description','required');
		//$this->form_validation->set_rules('qty','qty','required');

		

		if($this->form_validation->run()){
			echo true;
		}
		else{
			if(form_error('desc')!=null){
				$data['desc']=form_error('date');
			}
		
				
				

				
			echo json_encode($data);
		}

	}
	public function validatePet()
	{
			$this->form_validation->set_rules('name','Pet name','required|min_length[2]|callback_space');
		
	  		$this->form_validation->set_rules('type', 'Pet type', 'trim|required|min_length[2]|callback_space');
		 	$this->form_validation->set_rules('breed', 'Breed', 'trim|required|callback_space');
		 	$this->form_validation->set_rules('bday', 'Birthday', 'required');
		 	$this->form_validation->set_rules('mark', 'Markings', 'alpha|min_length[2]');
		 	
		 	if($this->form_validation->run()){


		 		echo true;

		 	}
		 	else{

		 		if(form_error('name')!=null){
		 			$data['name']=form_error('name');
		 		}
		 			if(form_error('type')!=null){
		 			$data['type']=form_error('type');
		 		}
		 			if(form_error('breed')!=null){
		 			$data['breed']= form_error('breed');
		 			
		 		}
		 			if(form_error('bday')!=null){
		 			$data['bday']= form_error('bday');
		 			
		 		}
		 			if(form_error('mark')!=null){
		 			$data['mark']= form_error('mark');
		 			
		 		}
		 		
		 		echo json_encode($data);


		 	}






	}

	public function validate(){
			$this->form_validation->set_rules('cnum','Contact','required|min_length[11]|max_length[11]|numeric');
			$this->form_validation->set_message('cnum','Invalid phone number');
	  		$this->form_validation->set_rules('addr', 'address', 'required');
		 	$this->form_validation->set_rules('email', 'Email address', 'required|valid_email');
		 	if($this->form_validation->run()){


		 		echo true;

		 	}
		 	else
		 	{
		 		if(form_error('cnum')!=null){
		 			$data['cnum']=form_error('cnum');
		 		}
		 			if(form_error('addr')!=null){
		 			$data['addr']=form_error('addr');
		 		}
		 			if(form_error('email')!=null){
		 			$data['email']= form_error('email');
		 			
		 		}
		 		
		 		echo json_encode($data);
		 	}




	}

	public function upClient(){
		

					$data=array('clientid'=>$this->input->post('id'),
					'cname'=>$this->input->post('name'),
					'contactno'=>$this->input->post('cnum'),
					'email'=>$this->input->post('email'),
					'address'=>$this->input->post('addr'));
					$this->vet_model->editClient($data);
				

				}

	public function getSalesReport(){
		$range = $this->input->get('range');
		if($range === 'daily'|| $range === 'monthly'){

			$this->load->library('Pdf');
			$pdf = new TCPDF();
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->addPage();
			
			$itemsReport = array();
			$servReport = array();

			if($range === 'daily'){
				$itemsArr = $this->vet_model->getSales2(date('Y-m-d'));
				$servArr = $this->vet_model->getSales(date('Y-m-d'));
			}
			elseif($range === 'monthly'){
				$year=date('Y');
				$month=date('m');
				$itemsArr = $this->vet_model->getSales2(null,$month, $year);
				$servArr = $this->vet_model->getSales(null,$month, $year);
			}

			foreach($itemsArr as $i){
				if(array_key_exists($i['itemid'], $itemsReport)){
					$itemsReport[$i['itemid']]['qty'] += $i['qty'];
					$itemsReport[$i['itemid']]['total'] += $i['total_cost'];
				}
				else {
					$itemsReport[$i['itemid']]['desc'] = $i['item_desc'];
					$itemsReport[$i['itemid']]['qty'] = $i['qty'];
					$itemsReport[$i['itemid']]['total'] = $i['total_cost'];
				}
			}
			$data['itemsReport'] = $itemsReport;

			foreach($servArr as $s){
				if(array_key_exists($s['serviceid'], $servReport)){
					$servReport[$s['serviceid']]['qty'] += 1;
					$servReport[$s['serviceid']]['total'] += $s['visit_cost'];
				}
				else {
					$servReport[$s['serviceid']]['desc'] = $s['desc'];
					$servReport[$s['serviceid']]['qty'] = 1;
					$servReport[$s['serviceid']]['total'] = $s['visit_cost'];
				}
			}
			$data['servReport'] = $servReport;

			$tbl = $this->load->view('clinic/salesreport',$data,TRUE);

			$pdf->writeHTML($tbl);
			ob_end_clean();	
			$pdf->Output('test.pdf', 'I');
		}
		else {
			redirect(base_url('vetclinic/salesreport'));
		}
	}

	public function billing(){
		$data['visits'] = $this->vet_model->getVisitForBilling();
		$data['bills'] = $this->vet_model->getbill();

		$header_data['title'] = "Billing";
		$record_data['notif']=$this->vet_model->notification();
		$record_data['events'] = $this->vet_model->getEventsByDate(date("Y-m-d"));
		$record_data['eventCounter'] = count($record_data['events']);
		$record_data['items'] = $this->vet_model->getAllZeroitems();
		$this->load->view('include/header2',$header_data);
		$this->load->view('clinic/billing',['data'=>$data,'record_dat'=>$record_data]);
		$this->load->view('include/footer');
	}

	// public function updatehistory(){
	// 	$visitid = $this->input->post('visitid');
	// 	$visit_cost = $this->input->post('visit_cost');
	// 	$total = $this->input->post('totalCost');
	// 	$newRecord = array('visit_cost'=>$visit_cost, 'Total'=>$total+$visit_cost);
	// 	if($this->vet_model->updateVisit($newRecord, $visitid))
	// 		redirect(base_url('vetclinic/billing'));
	// }

	public function addSupplier(){
		$data = array(
			'supplier_name'=>$this->input->post('supplier_name')
		);
		$this->vet_model->addSupplier($data);
		redirect(base_url());
	}

	public function addItemType(){
		$data = array(
			'itemtype'=>$this->input->post('itemtype')
		);
		$this->vet_model->addItemType($data);
		redirect(base_url());
	}

	public function addDistUnit(){
		$data = array(
			'dist_unit'=>$this->input->post('dist_unit')
		);
		$this->vet_model->addDistUnit($data);
		redirect(base_url());
	}

	public function addDoctor(){
		$lastID=$this->vet_model->getLastVet();
		$lastID	= str_split($lastID,4);
		$id = $lastID[1]+1;
		$id=str_pad($id,3,'0',STR_PAD_LEFT);
		$id='301-'.$id;
		
		$data = array(
			'vetid'=>$id,
			'vetname'=>$this->input->post('vetname')
		);
		$this->vet_model->addDoctor($data);
		redirect(base_url());
	}

	public function addBreed(){
		$data=array(
			'species'=>$this->input->post('species'),
			'breed'=>$this->input->post('breed')
		);
		$this->vet_model->addBreed($data);
		redirect(base_url());
	}

	public function getInvoiceData(){
		$visitDetails = $this->vet_model->getLastVisitDetails();
		// print_r($visitDetails);
		
		$clientid = explode('-', $visitDetails['visitid']);
		$clientid = $clientid[1];
		$client = $this->vet_model->get_by_id($clientid);
		$clientname = $client->cname;
		// echo $clientname;

		$test2 = $this->vet_model->getLastItemsUsed();
		// print_r($test2);

		$itemsUsed = array();
		foreach($test2 as $t){
			$i=array();
			$i['price'] = $this->vet_model->getFirstinPrice($t['items_used']);
			$i['item_desc'] = $t['item_desc'];
			$i['qty'] = $t['qty'];
			$i['total'] = $i['price']*$i['qty'];

			$itemsUsed[] = $i;
		}
		// print_r($itemsUsed);

		$this->session->set_userdata('visitDetails', $visitDetails);
		$this->session->set_userdata('clientName', $clientname);
		$this->session->set_userdata('itemsUsed', $itemsUsed);

	}
}

?>