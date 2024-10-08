<?php

namespace App\DataTables;
use App\CRM\DataTable\BaseDataTable;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Utilities\Request as DataTablesRequest;

class RolesDataTable extends BaseDataTable
{

    public $tableId = 'roles';
    public $createRoute = 'roles.create';
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $request = new DataTablesRequest();
        $db_connection = env('DB_CONNECTION');
        return datatables()
            ->eloquent($query)
            ->addColumn('actions', function($role){
                return view('roles.actions',compact('role'));
            })
            ->addColumn('created_at', function($role){
                return crm_date_format($role->created_at);
            })
            ->addColumn('updated_at', function($role){
                return crm_date_format($role->updated_at);
            })
            ->filter(function ($instance) use ($request, $db_connection) {
                if (!empty($request->get('name'))) {
                    $instance->where('roles.name', ($db_connection === 'mysql') ? 'LIKE' : 'ILIKE', "%" . $request->get('name') . "%");
                }
            })
            ->rawColumns(['actions']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AgentDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {
        $users=  $model->from(TableName(Role::class).' as roles')
            ->select(
                'roles.*'
            )->orderByDesc('roles.id');
        return $users->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
         return $this->builder()
             ->setFilters($this->getFilters())
             ->setTableId($this->tableId)
             ->columns($this->getColumns())
             ->minifiedAjax()
//             ->dom('Bfrtip')
             ->dom("<lf<t>ip>")
             /* ->orderBy(1)*/
             ->pageLength(10)
             ->buttons(
                 $this->buttons()
             )->parameters([
                 'dom'          => 'Bfrtip',
                 'buttons'      => ['csv','excel'],
                 'preDrawCallback' => "function(){showLoader()}",
                 'drawCallback' => "function(){hideLoader()}"
             ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('slug'),
            Column::computed('actions')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() :string
    {
        return 'Role_' . date('YmdHis');
    }

    public function getFilters(): array
    {
        return [
            'name'  => ['title' => 'Name', 'class' => '', 'type' => 'text', 'condition' => 'like', 'active' => true],
        ];
    }
}
