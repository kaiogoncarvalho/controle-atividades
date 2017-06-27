<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests\ActivityRequest;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ActivityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostra os dados do datatable em JSON
     *
     * @return JSON
     */

    public function index(Request $request)
    {
       $activities = Activity::select(
                '*',
               DB::raw(
                   '(CASE WHEN situation = 1 
                        THEN "'.trans('activity.enable').'" 
                        ELSE "'.trans('activity.disable').'"  
                        END
                    ) AS situation_name'))
               ->with('status');

       //Total de Registros
        $total = $activities->count();

        //Filtrar os registros
       if( $request->has('columns.*.search.value') ){
           foreach($request->input('columns') as $key => $value) {
               if($request->has("columns.$key.search.value")) {
                   $activities->where($value['name'], $value['search']['value']);
               }
           }
       }

       if( $request->has('search.value')){
           $activities->where('name','like', '%'.$request->input('search.value').'%');
       }
            //Registros Filtrados
            $total_fieltered = $activities->count();

            //Quantidade de linhas
            $activities->skip($request->input('start', 0));
            $activities->take($request->input('limit', 10));


            //Ordenação do Datatable
            $orderColumn = $request->input('order.0.column', '0');
            $orderDir    = $request->input('order.0.dir', 'asc');
            $orderColumnName = $request->input("columns.".$orderColumn.".name", 'name');

            $activities->orderBy($orderColumnName, $orderDir);



        return [
            "draw" =>  $request->input('draw'),
            "recordsTotal" =>  $total,
            "recordsFiltered" =>  $total_fieltered,
            'data' => $activities->get(),
        ];


    }

    // Retorna a view de Criação ou Edição de Atividade
    public function create()
    {
        return view('activity.new_edit', ['route' => 'activity/creating', 'status' => collectForm(Status::all()), 'disabled' => false]);
    }

    // Retorna a view de Criação ou Edição de Atividade com os dados da atividade solitada e validação se está concluida
    public function edit($id)
    {

       $activity = Activity::findOrFail($id);

        return view(
            'activity.new_edit',
            [
                'route'    => "activity/editing/$id",
                'status'   => collectForm(Status::all()),
                'activity' => $activity,
                'disabled' => $this->verifyActivity($activity)
            ]
        );
    }

    // Retorna a view Home
    public function home()
    {

        return view('activity.home', ['status' => collectForm(Status::all())]);
    }

    //Método para salvar ou alterar atividades
    protected function save($data, $id = null)
    {
        $data['user_id'] = Auth::id();
        Activity::updateOrCreate(
            ['id' => $id],
            $data
        );

    }

    //Método para validar se a atividade está concluída
    public function verifyActivity($activity)
    {
        if($activity->status_id == 4) {
            return true;
        }
        else {
            return false;
        }


    }

    //Método usado para a criação de Atividades
    public function creating(ActivityRequest $request)
    {
        $this->save($request->all());

        return redirect()
            ->route('home')
            ->with('alert', ['type' => 'success', 'message' => trans('activity.create_success')]);
    }

    //Método usado para edição de Atividade
    public function editing($id, ActivityRequest $request)
    {
        if ( $this->verifyActivity(Activity::findOrFail($id)) ) {
            return redirect()
                ->route('home')
                ->with('alert', ['type' => 'danger', 'message' => trans('activity.not_editable')]);
        }
        $this->save($request->all(), $id);

        return redirect()
            ->route('home')
            ->with('alert', ['type' => 'success', 'message' => trans('activity.edit_success')]);
    }

    //Método usado para deletar atividades
    public function delete($id)
    {
        Activity::destroy($id);
        return redirect()
            ->route('home')
            ->with('alert', ['type' => 'success', 'message' => trans('activity.delete_success')]);
    }
}
