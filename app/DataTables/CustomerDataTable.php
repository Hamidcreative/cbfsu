<?php

namespace App\DataTables;
use App\CRM\DataTable\BaseDataTable;
use App\Models\Agent;
use App\Models\User;
use App\Models\Customer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Utilities\Request as DataTablesRequest;

class CustomerDataTable extends BaseDataTable
{

    public $tableId = 'customers';
    public $createRoute = 'customer.create';
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
            ->addColumn('status', function($obj){
                if($obj->status)
                    return "<span class='badge bg-success '>Active</span> ";
                return "<span class='badge bg-primary '>InActive</span> ";
            })
            ->addColumn('actions', function($obj){
                return view('customers.actions',compact('obj'));
            })
            ->filter(function ($instance) use ($request, $db_connection) {
                if (!empty($request->get('name'))) {
                    $instance->where('name', ($db_connection === 'mysql') ? 'LIKE' : 'ILIKE', "%" . $request->get('name') . "%");
                }
            })
            ->rawColumns(['actions','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AgentDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customer $model)
    {
        return $model->newQuery()
            ->from(TableName(Customer::class) . ' as cust')
            ->leftJoin(TableName(User::class) . ' as user', 'cust.user_id', '=', 'user.id')
            ->select('cust.*', 'user.name as name', 'user.email as email', 'user.status as status')
            ->orderByDesc('cust.id');

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
            Column::make('address'),
            Column::make('city'),
            Column::make('state'),
            Column::make('zip'),
            Column::make('phone'),
            Column::make('contact_name')->title('Contact Name'),
            Column::make('position')->title('Position Title'),
            Column::make('email')->title('Email Address'),
            Column::make('signed_in')->title('Date Signed'),
            Column::computed('status'),
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
        return 'customer_' . date('YmdHis');
    }

    public function getFilters(): array
    {
        $datas['all'] = 'Select a Name';
        $objs  = Customer::from(TableName(Customer::class) . ' as cust')
            ->leftJoin(TableName(User::class) . ' as user', 'cust.user_id', '=', 'user.id')
            ->select('user.name as name', 'user.id as id')
            ->get();
        foreach($objs as $obj){
            $datas[$obj->id]= $obj->name;
        }
        return [
            'name'  => [ 'title' => 'Name','options' => $datas,'id'=>'role-filter', 'placeholder'=>'Select a Province', 'class' => 'filter-dropdown', 'type' => 'select', 'condition' => 'like', 'active' => true],
        ];
    }
}