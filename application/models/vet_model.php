	<?php
		
		class vet_model extends CI_Model{

			public function getClients(){
				$this->db->select('a.clientid,a.cname,count(b.clientid) as "pets"');
				$this->db->from('client a');
				$this->db->join('pet b','a.clientid = b.clientid','left outer');
				$this->db->group_by('a.clientid');     
			    $query = $this->db->get(); 
			    if($query->num_rows() != 0)
			    {
			        return $query->result_array();
			    }
			    else
			    {
			        return false;
			    }
			}

			public function getLastpet($id){
				$this->db->from('pet');
				$this->db->where('clientid',$id);
				$query = $this->db->get();

				return $query->num_rows();
			}

			public function getPets(){
				$query = $this->db->get('pet');
				return $query->result();

			}
			public function getUnits(){
				$query = $this->db->get('distribution_unit');
				return $query->result();

			}
			public function getItemtype(){
				$query = $this->db->get('item_type');
				return $query->result();

			}

			public function getItemTypeString($itemtype){
				$this->db->select('*');
				$this->db->from('item_type');
				$this->db->where('id',$itemtype);
				$query = $this->db->get();
				$res = $query->result();
				$row = $res[0]; 
				return $row->itemtype;
			}

			public function getSupplier(){
				$query = $this->db->get('supplier');
				return $query->result();

			}

			//chrstnv

			public function getStocks(){
			 $this->db->from('itemstock');
				$query = $this->db->get();
				return $query->result();
			}

			public function getServices(){
				$type = 'Treatment';
				$this->db->from('services');
				$this->db->where('type',$type);
				$query = $this->db->get();
				return $query->result();

			}

			public function getGrooms(){
				$type = 'Grooming';
				$this->db->from('services');
				$this->db->where('type',$type);
				$query = $this->db->get();
				return $query->result();

			}

			public function getVets(){
				$query = $this->db->get('veterinarian');
				return $query->result();

			}

			public function getAllitems(){
				 $this->db->from('itemstock');
				$query = $this->db->get();
				return $query->result_array();

			}
			//chrstnv

			public function getAllZeroitems(){
				$this->db->select('a.itemid,b.item_id,sum(b.item_qty) as "qty"');
				$this->db->from('itemstock a');
				$this->db->join('item_instance b','a.itemid = b.item_id','left outer');
				$this->db->having('sum(b.item_qty) =','0');
				$query = $this->db->get();
				return $query->result_array();

			}

			public function countgetAllZeroitems(){
				$this->db->select('a.itemid,b.item_id,sum(b.item_qty) as "qty"');
				$this->db->from('itemstock a');
				$this->db->join('item_instance b','a.itemid = b.item_id','left outer');
				$this->db->having('sum(b.item_qty) =','0');
				$query = $this->db->get();
				return $query->num_rows();

			}

			public function notification(){
				date_default_timezone_set('Asia/Manila');
				$today =date("Y-m-d");

				$this->db->select('a.itemid,b.item_id,sum(b.item_qty) as "qty"');
				$this->db->from('itemstock a');
				$this->db->join('item_instance b','a.itemid = b.item_id','left outer');
				$this->db->having('sum(b.item_qty) =','0');
				$query = $this->db->get();
				$invent= $query->num_rows();

				$this->db->from('schedule');
				$this->db->where('startdate =',$today);
				$query2 = $this->db->get();
				$sched= $query2->num_rows();

				return ($sched+$invent);

			}
			public function deleteItem($data){
			$this->db->where('itemid', $data);
			$this->db->delete('itemstock');



			}
				public function updateItem($data){
				$this->db->from('itemstock');
				$this->db->where('itemid',$data);
				$query = $this->db->get();
				return $query->result_array();


			}
			public function updates($data){

					$this->db->set('item_desc',$data['item_desc']);
					$this->db->set('item_type',$data['item_type']);
					$this->db->where('itemid',$data['itemid']);
					$this->db->update('itemstock');
						

			}




			public function getLastClient(){
				$query = $this->db->query("SELECT clientid FROM client ORDER BY clientid DESC LIMIT 1");
				$result = $query->result_array();
				$maxid = 0;
				foreach ($result as $row) {
					$maxid=$row['clientid'];
				}
				return $maxid;
						    
			}

			public function getOwnpets($id){
				$this->db->from('pet');
				$this->db->where('clientid',$id);
				$query = $this->db->get();

				return $query->result_array();

			}
			//chrstnv
			public function myItem($id){
					$this->db->from('item_instance');
					$this->db->where('item_id',$id);
					$query = $this->db->get();

					return $query->result_array();
			}

			public function getItems($id){
				
				$this->db->select('a.visitid,b.item_desc,a.items_used,b.itemid,a.qty');
				$this->db->from('items_used a');
				$this->db->join('itemstock b','a.items_used = b.itemid');
				// $this->db->group_by('b.clientid');     
				$this->db->where('a.visitid',$id);
				$query = $this->db->get();

				return $query->result_array();

			}

			public function getSales($date=null, $month=null, $year=null){
				$this->db->select('a.visit_cost,a.serviceid,a.visitdate,a.case_type,b.id,b.desc');
				$this->db->from('visit a');
				$this->db->join('services b','a.serviceid = b.id');
				// $this->db->group_by('b.clientid');     
				
				if(isset($date)){
					$this->db->where("CAST(visitdate as date) = '$date'");
				}
				elseif(isset($month) && isset($year)){
					$this->db->where("MONTH(visitdate) = '$month'");
					$this->db->where("YEAR(visitdate) = '$year'");
				}

				$query = $this->db->get();

				return $query->result_array();
			}
			
			public function getSalesSum($date=null){
				$this->db->select_sum('visit_cost');
				$this->db->from('visit');
				$this->db->where("CAST(visitdate as date) = '$date'");

				$query = $this->db->get();
				$result = $query->row_array();
				if($result['visit_cost'] == null)
					return 0;
				else
					return $result['visit_cost'];
			}

			public function getTotalSalesSum(){
				date_default_timezone_set('Asia/Manila');
				$date=date('Y-m-d');
				$serv = "Sold Item";
				$this->db->select_sum('total_cost');
				$this->db->from('itemhistory');
				$this->db->where("CAST(date as date) = '$date' AND action='$serv'");

				$query = $this->db->get();
				$result = $query->row_array();
				if($result['total_cost'] == null)
					return 0;
				else
					return $result['total_cost'];
			}
			
			public function getTotalSalesSumYesterday(){
				date_default_timezone_set('Asia/Manila');
				$date=date('Y-m-d',strtotime("-1 days"));
				$serv = "Sold Item";
				$this->db->select_sum('total_cost');
				$this->db->from('itemhistory');
				$this->db->where("CAST(date as date) = '$date' AND action='$serv'");

				$query = $this->db->get();
				$result = $query->row_array();
				if($result['total_cost'] == null)
					return 0;
				else
					return $result['total_cost'];
			}

			public function getTotalSalesSum2(){
				date_default_timezone_set('Asia/Manila');
				$date=date('Y-m-d');
				$this->db->select_sum('visit_cost');
				$this->db->from('visit');
				$this->db->where("CAST(visitdate as date) = '$date'");

				$query = $this->db->get();
				$result = $query->row_array();
				if($result['visit_cost'] == null)
					return 0;
				else
					return $result['visit_cost'];
			}
			
			public function getTotalSalesSumYesterday2(){
				date_default_timezone_set('Asia/Manila');
				$date=date('Y-m-d',strtotime("-1 days"));
				$this->db->select_sum('visit_cost');
				$this->db->from('visit');
				$this->db->where("CAST(visitdate as date) = '$date'");

				$query = $this->db->get();
				$result = $query->row_array();
				if($result['visit_cost'] == null)
					return 0;
				else
					return $result['visit_cost'];
			}

			public function getTotalPatients(){
				$query = $this->db->get('pet');
				return $query->num_rows();
			}

			public function getSales2($date=null, $month=null, $year=null){
				$serv="Sold Item";
				$this->db->select('a.itemid,a.item_desc,b.itemid,b.action,b.date,b.total_cost,b.qty');
				$this->db->from('itemstock a');
				$this->db->join('itemhistory b','a.itemid = b.itemid');
				$this->db->where('b.action',$serv);     

				if(isset($date)){
					$this->db->where("CAST(date as date) = '$date'");
				}
				elseif(isset($month) && isset($year)){
					$this->db->where("MONTH(date) = '$month'");
					$this->db->where("YEAR(date) = '$year'");
				}
				
				$query = $this->db->get();

				return $query->result_array();
			}

			public function getSalesSum2($date=null){
				$serv = "Sold Item";
				$this->db->select_sum('total_cost');
				$this->db->from('itemhistory');
				$this->db->where("CAST(date as date) = '$date' AND action='$serv'");

				$query = $this->db->get();
				$result = $query->row_array();
				if($result['total_cost'] == null)
					return 0;
				else
					return $result['total_cost'];
			}

			public function getSalesSumPerMonth($month,$year){
				$this->db->select_sum('visit_cost');
				$this->db->from('visit');
				$this->db->where("MONTH(visitdate) = '$month'");
				$this->db->where("YEAR(visitdate) = '$year'");

				$query = $this->db->get();
				$result = $query->row_array();
				if($result['visit_cost'] == null)
					return 0;
				else
					return $result['visit_cost'];
			}

			public function getSalesSumPerMonth2($month,$year){
				$serv = "Sold Item";
				$this->db->select_sum('total_cost');
				$this->db->from('itemhistory');
				$this->db->where("MONTH(date) = '$month'");
				$this->db->where("YEAR(date) = '$year'");
				$this->db->where('action',$serv);

				$query = $this->db->get();
				$result = $query->row_array();
				if($result['total_cost'] == null)
					return 0;
				else
					return $result['total_cost'];
			}

			public function getOwnvisits($id){

				$this->db->from('visit');
				$this->db->where('petid',$id);
				$query = $this->db->get();

				return $query->result_array();

			}

			public function getitemdetails($id){
				date_default_timezone_set('Asia/Manila');
				$dr=date('Y-m-d');
				$this->db->select('a.itemid,a.item_desc,a.item_unit,a.item_type,b.id,b.itemtype,c.id,c.dist_unit,d.item_id,d.item_qty,d.item_exp,sum(d.item_qty) as "totalq"');
				$this->db->from('itemstock a');
				$this->db->join('item_type b','a.item_type = b.id');
				$this->db->join('distribution_unit c','a.item_unit = c.id');
				$this->db->join('item_instance d','a.itemid = d.item_id','left outer');
				$this->db->where('a.itemid',$id);
				$this->db->where('d.item_exp >', $dr);
				$this->db->where('d.item_qty >', 0);
				$query = $this->db->get();

				return $query->row();
			}

			public function getitempurchase($id){
				date_default_timezone_set('Asia/Manila');
				$dr=date('Y-m-d');
				$this->db->select('a.item_id,a.item_cost,a.item_qty,a.item_sup,a.date_received,a.item_exp,b.id,b.supplier_name');
				$this->db->from('item_instance a');
				$this->db->join('supplier b','a.item_sup = b.id');
				$this->db->where('a.item_id',$id);
				$this->db->where('a.item_exp >', $dr);
				$this->db->where('a.item_qty >', 0);
				$query = $this->db->get();

				return $query->result_array();
			}

			public function saveClients($data,$finalid){
				$this->getClients();
				$pdata = array(
					  'clientid' => $finalid
				   );
				
				return $this->db->insert('client', $data,$pdata);

			}

			public function saveDates(){
				$ddata = array(
						'start' => $this->input->post('startdate'),
						'end' => $this->input->post('enddate'),
					);
				return $ddata;
			}

			public function savePets($finalid){
				$this->getClients();
				$pdata = array(
					  'petid' => $finalid.'-'.'1',
				      'clientid' => $finalid,
				      'pname' => $this->input->post('pname') ,
				      'breed' => $this->input->post('breed') ,
				      'species' => $this->input->post('species') ,
				      'birthday' => $this->input->post('birthday') ,
				      'sex' => $this->input->post('sex'),
				      'markings' => $this->input->post('markings'),
				   );

				return $this->db->insert('pet', $pdata);

			}


			public function saveAddPet($lpetid){
				$pdata = array(
					  'petid' => $this->input->post('addpetclientno').'-'.$lpetid,
				      'clientid' => $this->input->post('addpetclientno'),
				      'pname' => $this->input->post('pname') ,
				      'breed' => $this->input->post('breed') ,
				      'species' => $this->input->post('species') ,
				      'birthday' => $this->input->post('birthday') ,
				      'sex' => $this->input->post('sex') ,
				      'markings' => $this->input->post('markings'),
				   );
				//print_r($pdata);
				return $this->db->insert('pet', $pdata);

			}

			public function saveNewItem(){
				date_default_timezone_set('Asia/Manila');
				$date=date('dmy');
				$id=$this->getlastitem();
				$newid=$id+1;
				$string=$this->getItemTypeString($this->input->post('type'));
				$itype = substr($string, 0, 3);
				$idata = array(
					  'itemid' => $itype.$date.'-'.$newid,
				      'item_desc' => $this->input->post('item_desc'),
				      'item_unit' => $this->input->post('dis') ,
				      'item_type' => $this->input->post('type') 
				   );
				//print_r($pdata);
				return $this->db->insert('itemstock', $idata);

			}

			public function saveItemInstance(){
				date_default_timezone_set('Asia/Manila');
				$date=date('dmy');
				$dr=date('Y-m-d');
				$id=$this->getlastitem();
				$newid=$id;
				$string=$this->getItemTypeString($this->input->post('type'));
				$itype = substr($string, 0, 3);
				$idata = array(
					  'item_id' => $itype.$date.'-'.$newid,
				      'item_cost' => $this->input->post('item_cost'),
				      'item_qty' => $this->input->post('qty_left') ,
				      'item_sup' => $this->input->post('sup') ,
				      'item_exp' => $this->input->post('exp_date') ,
				      'date_received' => $dr,
				      'isExpired' => 0
				   );
				//print_r($pdata);
				return $this->db->insert('item_instance', $idata);

			}

			public function saveItemHistory(){
				date_default_timezone_set('Asia/Manila');
				$date=date('dmy');
				$dr=date('Y-m-d');
				$id=$this->getlastitem();
				$newid=$id;
				$string=$this->getItemTypeString($this->input->post('type'));
				$desc = $this->input->post('item_desc');
				$price = ((int)$this->input->post('item_cost'));
				$pcs = ((int)$this->input->post('qty_left'));
				$total_cost = ($price*$pcs);
				$itype = substr($string, 0, 3);
				$idata = array(
					  'itemid' => $itype.$date.'-'.$newid,
					  'action' => 'Add Product',
					  'description'=>'Add Product: Item [' .$itype.$date.'-'.$newid.' ]- '  .$desc .' with ' .$pcs . ' pc/s and price of ' .$price .' added ' ,
				      'total_cost' => $total_cost,
				      'qty' => $pcs
				   );
				//print_r($pdata);
				return $this->db->insert('itemhistory', $idata);
			}

			public function saveNewPurchaseHistory($id){
				date_default_timezone_set('Asia/Manila');
				$date=date('dmy');
				$dr=date('Y-m-d');
				$newid=$id;
				$string=$this->getItemTypeString($this->input->post('type'));
				$desc = $this->input->post('item_desc');
				$price = ((int)$this->input->post('item_cost'));
				$pcs = ((int)$this->input->post('qty_left'));
				$total_cost = ($price*$pcs);
				$itype = substr($string, 0, 3);
				$idata = array(
					  'itemid' => $newid,
					  'action' => 'Add Stock',
					  'description'=>'Add Stock: Item [' .$newid.' ]- '  .$desc .' with ' .$pcs . ' pc/s and price of ' .$price .' added ' ,
				      'total_cost' => $total_cost,
				      'qty' => $pcs
				   );
				//print_r($pdata);
				return $this->db->insert('itemhistory', $idata);
			}


			public function saveNewPurchase($id){
				date_default_timezone_set('Asia/Manila');
				$date=date('dmy');
				$dr=date('Y-m-d');
				$newid=$id;
				$string=$this->getItemTypeString($this->input->post('type'));
				$itype = substr($string, 0, 3);
				$idata = array(
					  'item_id' => $newid,
				      'item_cost' => $this->input->post('item_cost'),
				      'item_qty' => $this->input->post('qty_left') ,
				      'item_sup' => $this->input->post('sup') ,
				      'item_exp' => $this->input->post('exp_date') ,
				      'date_received' => $dr,
				      'isExpired' => 0
				   );
				//print_r($pdata);
				return $this->db->insert('item_instance', $idata);
			}
			public function menus($data){
				date_default_timezone_set('Asia/Manila');
				$date=date('dmy');
				$dr=date('Y-m-d');
				$id=$data['item_id'];
				$qty=$data['item_qty'];
				//$qty=$this->input->post('qty_used');
				$this->db->select('id,item_id,item_cost,item_qty,item_exp');
				$this->db->from('item_instance');
				$this->db->where('item_id',$id);
				$this->db->where('item_exp >', $dr);
				$this->db->where('item_qty >','0');
				$this->db->order_by('id', 'ASC');
						$query = $this->db->get();
						return $query->result_array();

			}

			public function subtractitem(){
				date_default_timezone_set('Asia/Manila');
				$date=date('dmy');
				$dr=date('Y-m-d');
				$id=$this->input->post('itemid');
				$qty=$this->input->post('qty_used');
				$this->db->select('id,item_id,item_cost,item_qty,item_exp');
				$this->db->from('item_instance');
				$this->db->where('item_id',$id);
				$this->db->where('item_exp >', $dr);
				$this->db->where('item_qty >','0');
				$this->db->order_by('id', 'ASC');
				$query = $this->db->get();
	
				$item = $query->result_array();
				// $i=int($i);
				$total = 0;
				for($i = 0; $i < count($item); $i++){
					if($qty != 0){
						if($qty >= $item[$i]['item_qty']){
							$qtyLeft = $item[$i]['item_qty'];
							$total += ($item[$i]['item_qty'] * $item[$i]['item_cost']);
							$this->db->set('item_qty',0, false);
						    $this->db->where('id' , $item[$i]['id']);
						    $this->db->update('item_instance');
						    $qty -= $item[$i]['item_qty'];
						}
						else{
							$total += ($qty * $item[$i]['item_cost']);
							$this->db->set('item_qty',($item[$i]['item_qty']-$qty), false);
						    $this->db->where('id' , $item[$i]['id']);
						    $this->db->update('item_instance');
						    $qty = 0;	
						}	
					}
					else{
						break;
					}
				}
				return $total;
			}

			public function saveItemSaleHistory(){
				date_default_timezone_set('Asia/Manila');
				$date=date('dmy');
				$dr=date('Y-m-d');
				$id=$this->input->post('itemid');
				$pcs=$this->input->post('qty_used');

				$this->db->select('a.itemid,a.item_desc,d.item_id,d.item_qty,d.item_exp,sum(d.item_qty) as "totalq"');
				$this->db->from('itemstock a');
				$this->db->join('item_instance d','a.itemid = d.item_id','left outer');
				$this->db->where('a.itemid',$id);
				$this->db->where('d.item_exp >', $dr);
				$query = $this->db->get();
				$hehe['hehe'] = $query->row();

				$total_cost = $this->subtractitem();
				foreach ($hehe as $item){
				$idata = array(
					  'itemid' => $id,
					  'action' => 'Sold Item',
					  'description'=>'Sold Item: Item [' .$id.' ]- '  .$item->item_desc.' with ' .$pcs . ' pc/s total cost of ' .$total_cost .' only ' .(($item->totalq)-$pcs).' pc/s left',
				      'total_cost' => $total_cost,
				      'qty' => $pcs
				   );
				}
				//print_r($pdata);
				return $this->db->insert('itemhistory', $idata);
			}

			public function addItemUsed2($option,$visitid){
				$idata = array(
					  //'visitid' => $visitid,
				      'items_used' => $option
				   );
				//print_r($pdata);
			   $this->db->insert('items_used', $idata);
	        	 $this->db->from('itemstock');
				$query = $this->db->get();
				return $query->num_rows();
			}

			public function addItemUsed($data){
				
				 
		
			    $this->db->insert('items_used', $data);
			   
	 
			}

			public function getLastpetvisit(){
				$pet=$this->input->post('pet');
				$this->db->from('visit');
				$this->db->where('petid',$pet);
				$query = $this->db->get();

				return $query->num_rows();
			}

			public function getlastitem(){
				$query = $this->db->get('itemstock');
				return $query->num_rows();
			}
			//chrstnv: item transaction to history


			// public function addToHistory{







		// }
		public function saveHistory(){
			date_default_timezone_set('Asia/Manila');
			$date=date('Y-m-d H:i:s');
			$pet=$this->input->post('pet');
			$yr=date('y');
			$petv=$this->getLastpetvisit();
			$petv=$petv+1;
			$vdata = array(
				  'visitid' => $yr.'-'.$pet.'-'.$petv,
				  'petid' => $this->input->post('pet'),
			      'serviceid' => $this->input->post('Select1') ,
			      'visitdate' => $date,
			      'findings' => $this->input->post('findings') ,
			      'recommendation' => $this->input->post('recom'),
			      'case_type' => $this->input->post('optradio'),
			      //'visit_cost' => $this->input->post('totalCost'),
			      'total' => $this->input->post('totalCost')+$this->input->post('hiddenSum'),
			      'itemCost'=> $this->input->post('hiddenSum')  );


			return $this->db->insert('visit', $vdata);

		}
		// public function itemUsage($data){
		// 	  $this->db->select('qty_left');
		// 	$this->db->where('itemid',$data['id']);
		// 	$query= $this->db->get('itemstock');
		// 	$stock= $query->row()->qty_left;
		// 	$min= $stock-$data['item'];
		// 	//update
		// $this->db->set('qty_left',$min);
		// $this->db->where('itemid',$data['id']);
		// $this->db->update('itemstock');


		// 	return $min;

		// }


		public function get_by_id($id)
		{
			$this->db->from('client');
			$this->db->where('clientid',$id);
			$query = $this->db->get();

			return $query->row();
		}

		
		public function getpet_by_id($id)
		{
			$this->db->from('pet');
			$this->db->where('petid',$id);
			$query = $this->db->get();

			return $query->row();
		}

		public function getvisit_by_id($id)
		{
			$this->db->select('a.petid,b.pname,a.visitid,a.serviceid,a.visitdate,a.findings,a.recommendation,a.case_type,a.visit_cost,c.id,c.desc,a.Total,a.itemCost');
			$this->db->from('visit a');
			$this->db->join('pet b','a.petid = b.petid');
			$this->db->join('services c','a.serviceid = c.id');
			// $this->db->group_by('b.clientid');     
			$this->db->where('a.visitid',$id);
			$query = $this->db->get();

			return $query->row();
		}

		public function getVisitForBilling(){
			$this->db->select('*');
			$this->db->from('visit');
			$this->db->where('visit_cost',0);
			$this->db->order_by('visitdate', 'DESC');

			$query = $this->db->get();
			
			
			return $query->result_array();
		}
			public function getbill(){
			$this->db->select('*');
			$this->db->from('visit');
			$this->db->where('visit_cost',0);
			$this->db->order_by('visitdate', 'DESC');

			$query = $this->db->get();
			
			
			return $query->num_rows();
		}

		// public function updateVisit($newRecord, $id){
		// 	$this->db->where('visitid', $id);
		// 	$this->db->update('visit',$newRecord);
		// 	return true;
		// }




private $table = "schedule";



		public function get_events($start, $end, $vetid)
		{
		    return $this->db->where("startdate >=", $start)
							->where("enddate <=", $end)
							->where("vetid", $vetid)
		    				->get("schedule");
		}

		public function getEventsByDate($date){
			$this->db->where("CAST(startdate as date) = '$date'");
			$query = $this->db->get("schedule");

			return $query->result_array();
		}

		public function add_event($data)
		{
		    $this->db->insert("schedule", $data);
		}

		public function get_event($id)
		{
		    return $this->db->where("ID", $id)
		    				->get("schedule");
		}

		public function update_event($id, $data)
		{
		    $this->db->where("ID", $id)
		    		 ->update("schedule", $data);
		}

		public function delete_event($id)
		{
		    $this->db->where("ID", $id)
		    		 ->delete("schedule");
		}
		
		public function update($data,$condition){
			$this->db->where($condition);
			$this->db->update($this->table, $data);
			return TRUE;	
		}
		public function editClient($data){
		

			$this->db->where('clientid',$data['clientid']);
			$this->db->update('client',$data);
			return $data;	
	
		}

		public function addSupplier($data){
			$this->db->insert('supplier', $data);
		}

		public function addItemType($data){
			$this->db->insert('item_type', $data);
		}

		public function addDistUnit($data){
			$this->db->insert('distribution_unit', $data);
		}

		public function addDoctor($data){
			$this->db->insert('veterinarian', $data);
		}

		public function getLastVet(){
			$this->db->select('vetid');
			$this->db->from('veterinarian');
			$this->db->order_by('vetid', 'DESC');

			$query=$this->db->get();

			$id=$query->row_array();
			$id = $id['vetid'];

			return $id;
		}

		public function addBreed($data){
			$this->db->insert('breeds', $data);
		}

	}

?>