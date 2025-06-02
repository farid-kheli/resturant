<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tabel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TabelController extends Controller
{
    public function storeTabel(Request $request)
    {
        // Logic to store a new table
        $validatedData = $request->validate([
            'number' => 'required|integer',
            'capacity' => 'required|integer',
        ]);
        
        $qrCodePath= "../public/qrcode/". str::random(30).".svg";
        QrCode::format('svg')->size(100)->generate('Table Number: ' . $validatedData['number'], $qrCodePath);
        Tabel::create([
            "number" => request()->number,
            "qr_code" => $qrCodePath,
            "capacity" => request()->number,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Table created successfully', 'data' => ['qr_code' => $qrCodePath]]);
    }

   

    public function deletetabel($id)
    {
        $tabel = Tabel::findOrFail($id);
        $tabel->delete();
        return response()->json(['status' => 'success', 'message' => 'Table deleted successfully', 'data' => null]);
    }
}
