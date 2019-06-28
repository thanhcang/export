<?php


namespace App\Http\Controllers\Api;


use App\Helpers\Lang\Lang;
use App\Http\Controllers\Controller;
use App\Policies\UserPolicy;
use App\Traits\RequestPaginate;
use App\Traits\Sort;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use RequestPaginate, RequestPaginate, Sort;

    protected $data = [];

    protected $gateAbility = '';

    protected $checkPermission = false;

    public function __construct()
    {
        parent::__construct();

        if ($this->checkPermission) {
            $this->middleware(function ($request, $next) {
                if ($this->authorize(UserPolicy::METHOD_NAME, [User::class, $this->gateAbility])) {
                    return $next($request);
                }
            });
        }
    }

    protected function currentUser()
    {
        return auth('api')->user();
    }

    protected function push(string $key, $value)
    {
        if ($value instanceof Collection) {
            if ($value->isEmpty()) {
                $value = null;
            }
        }

        $this->data[$key] = $value;
    }

    protected function render(string $msg = '', $code = 1, bool $success = true, int $httpCode = 202)
    {
        $result = [
            'code'    => $code,
            'data'    => $this->data === [] ? null : $this->data,
            'status'  => $success === true ? config('api.status.success') : config('api.status.fail'),
            'message' => $msg === '' ? ($success === true ? config('api.msg.success') : config('api.msg.fail')) : $msg,
        ];

        return response()->json($result, $httpCode);
    }

    protected function render404()
    {
        return response()->json(null, 404);
    }

    protected function render422(string $msg, int $code)
    {
        $result = [
            'code'    => $code,
            'message' => $msg,
        ];
        return response()->json($result, 422);
    }

    protected function apiValidate(Request $request, array $rules)
    {
        return $this->validate($request, $rules, Lang::get('validation'));
    }

}
