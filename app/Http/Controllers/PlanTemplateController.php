<?php

namespace App\Http\Controllers;

use App\Models\PlanTemplate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanTemplateController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $template = PlanTemplate::getAndOrCreate(Auth::id())
            ->getTemplateJson();

        return view('plan-template.create', [
            'template' => $template
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'template' => 'required|json',
        ]);

        $plan_template = PlanTemplate::where('user_id', Auth::id())
            ->firstOrFail();

        $plan_template->template = $request->get('template');
        $plan_template->save();

        return new JsonResponse('Plan Template Saved', 200);
    }
}
