<?php

namespace App\Imports;

use App\Models\TrackCode;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TrackCodeImport implements ToCollection
{
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue;
            }
            $track_code = TrackCode::where('code', $row[1])->first();
            if ($track_code) {
                $track_code->update([
                    'status_track_code_id' => $this->status
                ]);
            } else {
                TrackCode::create([
                    'code' => $row[1],
                    'status_track_code_id' => $this->status
                ]);
            }
        }
    }
}
