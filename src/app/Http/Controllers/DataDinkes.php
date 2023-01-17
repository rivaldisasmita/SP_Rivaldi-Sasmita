<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailRequest;
use App\Http\Transformers\DinkesTransformer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Http;
use App\Http\Transformers\ResponseTransformer;

class DataDinkes extends Controller
{
    protected $repo;

    public function __construct()
    {
        $this->repo = app()->make('repo.dinkes');
    }

    public function index(Request $request)
    {
        try {
            $response = $this->repo->index($request);
            if ($response instanceof MessageBag) {
                return (new ResponseTransformer)->toJson(400, __('messages.400'), $response);
            }
            if (!$response) {
                return (new ResponseTransformer)->toJson(400, __('messages.400'));
            }
            return (new DinkesTransformer)->all(200, __('messages.200'), $response);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function show(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required'
            ]);

            $response = $this->repo->show($request);
            if ($response instanceof MessageBag) {
                return (new ResponseTransformer)->toJson(400, __('messages.400'), $response);
            }
            return (new DinkesTransformer)->detail(200, __('messages.200'), $response);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
