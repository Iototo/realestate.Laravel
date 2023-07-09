<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\RealestateRequest;
use Illuminate\Support\Facades\Auth;


class PropertyController extends Controller
{
    public function index()
    {
        $properties = DB::table('realestates')
            ->join('accounts', 'realestates.account_id', '=', 'accounts.id')
            ->select('realestates.*', 'accounts.name as account_name')
            ->paginate(10);

        return view('property.index', ['properties' => $properties]);
    }


    public function regist()
    {
        return view('property/regist');
    }

    public function store(RealestateRequest $request)
    {
        $property = new Property;

        // 各フィールドの値をセットする
        $property->name = $request->input('name');
        $property->breadth = $request->input('breadth');
        $property->address = $request->input('address');
        $property->floor_plan = $request->input('floor_plan');
        $property->tenancy_status = $request->input('tenancy_status');
        $account = Auth::user(); // 関連するアカウントを取得する
        $property->account_id = $account->id; // アカウントのIDを設定する
        $property->save();

        return redirect()->route('property.index');
    }


    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('property.edit', compact('property'));
    }

    public function update(RealestateRequest $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return redirect()->route('property.edit', ['id' => $id])->with('success', '物件情報が更新されました');

    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('property.index');
    }



    public function spec($id)
    {
        $property = DB::table('realestates')->where('id', $id)->first();

        if ($property === null) {
            // You can either return an error message
            // return response()->json(['error' => 'Property not found'], 404);

            // Or redirect the user to another page
            return redirect()->route('property.index');
        }

        return view('property.spec', ['property' => $property]);
    }


    public function exportCsv()
    {
        $properties = DB::table('realestates')
            ->join('accounts', 'realestates.account_id', '=', 'accounts.id')
            ->select('realestates.*', 'accounts.name as account_name')
            ->get();

        $csvHeader = ['物件名', '住所', '広さ（㎡）', '間取り', '入居状況', '物件登録者'];
        $csvBody = [];

        foreach ($properties as $property) {
            $csvBody[] = [
                $property->name,
                $property->address,
                $property->breadth,
                $property->floor_plan,
                $property->tenancy_status == 1 ? '満室' : ($property->tenancy_status == 2 ? '空室' : ($property->tenancy_status == 3 ? '空室予定' : '')),
                $property->account_name,
            ];
        }

        $filename = "properties.csv";
        $file = fopen($filename, "w");

        fputcsv($file, $csvHeader);
        foreach ($csvBody as $row) {
            fputcsv($file, $row);
        }

        fclose($file);

        return response()->download($filename);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('name');
        $address = $request->input('address');

        // Save the search parameters to the session
        $request->session()->put('keyword', $keyword);
        $request->session()->put('address', $address);

        $properties = DB::table('realestates')
            ->join('accounts', 'realestates.account_id', '=', 'accounts.id')
            ->when($keyword, function ($query, $keyword) {
                return $query->where('realestates.name', 'like', "%{$keyword}%");
            })
            ->when($address, function ($query, $address) {
                return $query->orWhere('realestates.address', 'like', "%{$address}%");
            })
            ->select('realestates.*', 'accounts.name as account_name')
            ->paginate(10);

        return view('property.search', ['properties' => $properties]);
    }

    public function searchexportCsv(Request $request)
        {
            // Retrieve the search parameters from the session
            $keyword = $request->session()->get('keyword');
            $address = $request->session()->get('address');

            $properties = DB::table('realestates')
                ->join('accounts', 'realestates.account_id', '=', 'accounts.id')
                ->when($keyword, function ($query, $keyword) {
                    return $query->where('realestates.name', 'like', "%{$keyword}%");
                })
                ->when($address, function ($query, $address) {
                    return $query->orWhere('realestates.address', 'like', "%{$address}%");
                })
                ->select('realestates.*', 'accounts.name as account_name')
                ->get();

        $csvHeader = ['物件名', '住所', '広さ（㎡）', '間取り', '入居状況', '物件登録者'];
        $csvBody = [];

        foreach ($properties as $property) {
            $csvBody[] = [
                $property->name,
                $property->address,
                $property->breadth,
                $property->floor_plan,
                $property->tenancy_status == 1 ? '満室' : ($property->tenancy_status == 2 ? '空室' : ($property->tenancy_status == 3 ? '空室予定' : '')),
                $property->account_name,
            ];
        }

        $filename = "properties.csv";
        $file = fopen($filename, "w");

        fputcsv($file, $csvHeader);
        foreach ($csvBody as $row) {
            fputcsv($file, $row);
        }

        fclose($file);

        return response()->download($filename);
    }

}
