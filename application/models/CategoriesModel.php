<?php 



/**
 * 
 */
class CategoriesModel extends CI_Model
{
	

	function read()
	{
		$this->db->select('category_id, category');
		
		$this->db->from('categories');
			
		$query = $this->db->get();

		return $query->result();

	}

	public function store($category)
	{
		$data = array(
        'category' => $category
);
		$this->db->insert('categories', $data);
	}

	public function edit($category, $idcategory)
	{
		$this->db->set('category', $category);

		$this->db->where('category_id', $idcategory);

		$this->db->update('categories');
	}

	public function destroy($idcategory)
	{
		$this->db->where('category_id', $idcategory);

		$this->db->delete('categories');
	}
}