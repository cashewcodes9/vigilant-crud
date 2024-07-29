<?php

namespace App\Repositories;

use App\Models\Book;

/**
 * Class BookRepository
 * @package App\Repositories
 */
class BookRepository
{

   public function index()
   {
       return Book::all();
   }

   public function get($id)
   {
       return Book::findOrFail($id);
   }

   public function store($data)
   {
       return Book::create($data);
   }

   public function update(array $data, $id)
   {
       return Book::whereId($id)->update($data);
   }

   public function delete($id)
   {
       return Book::destroy($id);
   }

}
