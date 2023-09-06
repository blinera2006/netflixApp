<?php

namespace App\Http\Controllers;
use App\Models\Series;
use App\Http\Requests\StoreSeriesRequest;
use App\Http\Requests\UpdateSerieRequest;
use Illuminate\Http\Request;


class SerieController extends Controller
{
    public function index()
    {
        $series = Series::all();
        return response()->json($series);
    }
    public function store(StoreSeriesRequest $request)
    {
        $serie = new Series();

        $serie->name = $request->name;
        $serie->description = $request->description;

        $serie->save();


    }
    public function show($id)
    {
        $serie = new Series();
        $serie = Series::findOrFail($id);
        return response()->json($serie);

    }
    public function destroy($id)
    {
        $serie = new Series();
        $serie = Series::findOrFail($id);
        $serie->delete();
        return response()->json(['mesage' => 'category was deleted']);

    }
    public function update(UpdateSerieRequest $request, $id)
    {
        $serie = Series::findOrFail($id);

        $serie->name = $request->name;
        $serie->description = $request->description;
        $serie->update();
        return response()->json([
            'message' => 'THE USER WAS UPDATED'
        ]);


    }
}
