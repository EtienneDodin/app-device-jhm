<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;

class DevicesExport implements FromCollection, WithHeadings, WithColumnFormatting, WithMapping, ShouldAutoSize, WithStyles
{
    protected $devices;

    public function __construct($devices)
    {
        $this->devices = $devices;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style headings row
            1 => [
                'font' => [
                    'bold' => true,
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => '30B6EA']
                ],
                'alignment' => [
                    'horizontal' => 'center',
                ],
            ],
        ];
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'ID',
            'Code',
            'Type',
            'Owner',
            'Location',
            'Service',
            'Phone number',
            'IP',
            'Créé le',
            'Modifié le',
        ];
    }

    public function map($device): array
    {
        return [
            $device->id,
            $device->code,
            $device->type->name,
            $device->owner_id ? $device->owner->name : '',
            $device->location_id ? $device->location->name : '',
            $device->service_id ? $device->service->name : '',
            $device->phone_number,
            $device->ip,
            Date::dateTimeToExcel($device->created_at),
            Date::dateTimeToExcel($device->updated_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->devices;
    }
}
