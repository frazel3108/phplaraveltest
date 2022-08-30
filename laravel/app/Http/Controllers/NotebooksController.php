<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class NotebooksController
 * @package  App\Http\Controllers
 */
class NotebooksController extends Controller
{
    /**
     * @OA\Get(
     *  path="/",
     *  operationId="idNotebook",
     *  tags={"Notebooks"},
     *  summary="Get list of Notebooks",
     *  description="Returns list of Notebooks",
     *  @OA\Response(response=200, description="Successful operation",
     *    @OA\JsonContent(ref="#/components/schemas/Notebooks"),
     *  ),
     * )
     *
     * Display a listing of Product.
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Notebook::get(), 200);
    }

    /**
     * @OA\Get(
     *   path="/{id}",
     *   summary="Show a Notebook from his Id",
     *   description="Show a Notebook from his Id",
     *   operationId="showNotebook",
     *   tags={"Notebooks"},
     *   @OA\Parameter(ref="#/components/parameters/Notebook--id"),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *         @OA\Property(
     *         ref="#/components/schemas/Notebooks"
     *         ),
     *     ),
     *   ),
     *   @OA\Response(response="404",description="Notebook not found"),
     * )
     *
     * @param $idNotebook
     * @return JsonResponse
     */
    public function show($idNotebook)
    {
        $notebook = Notebook::find($idNotebook);
        if (is_null($notebook)) {
            return response()->json(['error' => true, 'message' => 'Not Found'], 404);
        }
        return response()->json(Notebook::find($idNotebook), 200);
    }

    /**
     * @OA\Post(
     ** path="/",
     *   tags={"Notebooks"},
     *   summary="Adding an entry of Notebooks",
     *   operationId="add",
     *
     *  @OA\Parameter(
     *      name="full_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="company",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="tel",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="date_birth",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="date"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="photo",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *      description="Notebooks created",
     *      @OA\JsonContent(
     *      @OA\Property(
     *        ref="#/components/schemas/Notebooks"
     *      ),
     *    ),
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *)
     **/
    public function store(Request $request)
    {
        $rules = [
            'full_name' => 'required',
            'tel' => 'required',
            'email' => 'required|email|unique:notebooks',
            'date_birth' => 'date_format:Y-m-d',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $notebook = Notebook::create($request->all());
        return response()->json($notebook, 201);
    }

    /**
     * @OA\Post(
     ** path="/{id}",
     *   tags={"Notebooks"},
     *   summary="Update an entry of Notebooks",
     *   operationId="update",
     *
     *  @OA\Parameter(ref="#/components/parameters/Notebook--id"),
     *
     *  @OA\Parameter(
     *      name="full_name",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="company",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="tel",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="date_birth",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="date"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="photo",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *      description="Notebooks created",
     *      @OA\JsonContent(
     *      @OA\Property(
     *        ref="#/components/schemas/Notebooks"
     *      ),
     *    ),
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *
     *   @OA\Response(
     *      response=404,
     *      description="Not Found Notebook"
     *   ),
     *)
     **/
    public function update(Request $request, $idNotebook)
    {
        $notebook = Notebook::find($idNotebook);
        if (is_null($notebook)) {
            return response()->json(['error' => true, 'message' => 'Not Found'], 404);
        }

        $rules = [
            'date_birth' => 'date_format:Y-m-d',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $notebook->update($request->all());

        return response()->json($notebook, 201);
    }

    /**
     * @OA\Delete(
     *  path="/{id}",
     *  summary="Delete a Notebook",
     *  description="Delete a Notebook",
     *  operationId="destroyNotebook",
     *  tags={"Notebooks"},
     *  @OA\Parameter(ref="#/components/parameters/Notebook--id"),
     *  @OA\Response(response=204,description="NULL"),
     *  @OA\Response(response=404,description="Not Found Notebook"),
     * )
     *
     * @param Product $Product
     * @return Response|JsonResponse
     */
    public function delete($idNotebook)
    {
        $notebook = Notebook::find($idNotebook);
        if (is_null($notebook)) {
            return response()->json(['error' => true, 'message' => 'Not Found'], 404);
        }
        $notebook->delete();
        return response()->json(null, 204);
    }
}
