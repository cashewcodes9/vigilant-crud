<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    private BookRepositoryInterface $bookRepositoryInterface;

    public function __construct(BookRepositoryInterface $bookRepositoryInterface)
    {
        $this->bookRepositoryInterface = $bookRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->bookRepositoryInterface->index();
        return ApiResponseClass::sendResponse(BookResource::collection($data), '', 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        DB::beganTransaction();
        try {
            $book = $this->bookRepositoryInterface->store($request);
            DB::commit();
            return ApiResponseClass::sendResponse(new BookResource($book), 'Book created successfully', 201);
        } catch (\Exception $e) {
            ApiResponseClass::rollback($e, 'Book creation failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book = $this->bookRepositoryInterface->show($book);
        return ApiResponseClass::sendResponse(new BookResource($book), '', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, $id)
    {
        DB::beganTransaction();
        try {
            $book = $this->bookRepositoryInterface->update($request, $id);
            DB::commit();
            return ApiResponseClass::sendResponse(new BookResource($book), 'Book updated successfully', 201);
        } catch (\Exception $e) {
            ApiResponseClass::rollback($e, 'Book update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        DB::beganTransaction();
        try {
            $this->bookRepositoryInterface->delete($book);
            DB::commit();
            return ApiResponseClass::sendResponse([], 'Book deleted successfully', 200);
        } catch (\Exception $e) {
            ApiResponseClass::rollback($e, 'Book deletion failed');
        }
    }
}
