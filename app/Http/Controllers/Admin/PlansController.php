<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\plan;
use Illuminate\Http\Request;
use App\Http\Requests\PlanValidation;

use Session;

class PlansController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(plan $plan)
    {
        $plans = $plan->plans()->paginate(20);
        return view('admin.plans.index',compact('plans'));
    }

  
    public function create()
    {
        return view('admin.plans.Form');
    }

  
    public function store(planValidation $request)
    {   
        $plan =new plan();
        $plan->fill($request->all());
        $plan->save();
        Session::flash('success',' Sucessfully Created the ' .$request->name . ' plan .');
        return redirect()->route('plans.index');
    }

    
    // show plan details
    public function show(plan $plan)
    {
        return view('admin.plans.show',compact('plan'));
    }
    // edit plan details
    public function edit(plan $plan)
    {
        return view('admin.plans.Form',compact('plan'));
    }
    // update function
    public function update(planValidation $request, plan $plan)
    {         
        $plan->name =$request->name;
        $plan->slug =$request->slug;
        $plan->url =$request->url;
        $plan->save();
            Session::flash('success',' Sucessfully update the ' .$request->name . ' plan .');
        return redirect()->route('plans.index');

    }
// for hide plan    
    public function destroy(plan $plan)
    {   
        $name = $plan->name;
        $plan = plan::find($plan)->first();
        $plan->delete();
        Session::flash('success',' Sucessfully deleted the ' .$name . ' plan .');
        return redirect()->route('plans.index');
    }
}
