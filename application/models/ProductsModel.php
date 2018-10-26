<?php

/**
 * 
 */
class ProductsModel extends CI_Model
{
	
	function read()
	{
		$this->db->select('product_id, category, title, description');
		
		$this->db->from('categories');
		
		$this->db->join('products', 'categories.category_id = products.category_id');
		
		$query = $this->db->get();

		return $query->result();

	}

	public function store($title, $description, $idcategory)
	{
		$data = array(
        'title' => $title,
        'description' => $description,
        'category_id' => $idcategory
);
		$this->db->insert('products', $data);
	}

	public function edit($title, $description, $idcategory, $idproduct)
	{
		$this->db->set('title', $title);

		$this->db->set('description', $description);

		$this->db->set('category_id', $idcategory);

		$this->db->where('product_id', $idproduct);

		$this->db->update('products');
	}

	public function destroy($idproduct)
	{
		$this->db->where('product_id', $idproduct);

		$this->db->delete('products');
	}
}