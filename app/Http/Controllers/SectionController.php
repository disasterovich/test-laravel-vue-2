<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use App\Http\Resources\Section as SectionResource;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = [];

        $sections = Section::where('parent_id',0)->get();


        foreach ($sections as $section) {

            $result[$section->id] = [
                'id' => $section->id,
                'name' => $section->name,
                'parent_id' => $section->parent_id,
            ];

            $children = Section::where('parent_id',$section->id)->get();

            //TODO обход рекурсивный
            if ($children) {

                foreach ($children as $child) {
                    $result[$section->id]['children'][$child->id] = [
                        'id' => $child->id,
                        'name' => $child->name,
                        'parent_id' => $child->parent_id,
                    ];
                }
            }
        }

        return $result;
        //return SectionResource::collection($sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}
