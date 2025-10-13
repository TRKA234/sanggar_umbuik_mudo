<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /**
     * Display a simple orders report using dummy data.
     */
    public function index(Request $request)
    {
        // Dummy report data (generate 20 dummy rows)
        $reports = $this->getDummyReports(20);

        // optional month filter (1-12). If provided, filter reports by month of 'date'
        $month = $request->query('month');
        if ($month) {
            $month = (int) $month;
            if ($month >= 1 && $month <= 12) {
                $reports = array_values(array_filter($reports, fn($r) => (int)date('n', strtotime($r['date'])) === $month));
            }
        }

        // Simple summary
        $summary = [
            'total_orders' => count($reports),
            'total_revenue' => array_sum(array_map(fn($r) => $r['total'], $reports)),
            'paid' => count(array_filter($reports, fn($r) => $r['status'] === 'Lunas')),
            'unpaid' => count(array_filter($reports, fn($r) => $r['status'] === 'Belum Bayar')),
        ];

        return view('admin.reports.index', compact('reports', 'summary'));
    }

    /**
     * Export reports as CSV (dummy data for now).
     */
    public function exportCsv(Request $request)
    {
        $reports = $this->getDummyReports(20);
        $month = $request->query('month');
        if ($month) {
            $month = (int) $month;
            if ($month >= 1 && $month <= 12) {
                $reports = array_values(array_filter($reports, fn($r) => (int)date('n', strtotime($r['date'])) === $month));
            }
        }

        $filename = 'laporan_pemesanan_' . date('Ymd_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($reports) {
            $output = fopen('php://output', 'w');
            // header row
            fputcsv($output, ['No Pesanan', 'Pelanggan', 'Jasa', 'Tanggal', 'Status', 'Total']);

            foreach ($reports as $r) {
                fputcsv($output, [$r['order_no'], $r['customer'], $r['service'], $r['date'], $r['status'], $r['total']]);
            }

            fclose($output);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Export reports as PDF (uses barryvdh/laravel-dompdf if installed).
     */
    public function exportPdf(Request $request)
    {
        // generate dummy data
        $reports = $this->getDummyReports(20);
        $month = $request->query('month');
        if ($month) {
            $month = (int) $month;
            if ($month >= 1 && $month <= 12) {
                $reports = array_values(array_filter($reports, fn($r) => (int)date('n', strtotime($r['date'])) === $month));
            }
        }

        $summary = [
            'total_orders' => count($reports),
            'total_revenue' => array_sum(array_map(fn($r) => $r['total'], $reports)),
            'paid' => count(array_filter($reports, fn($r) => $r['status'] === 'Lunas')),
            'unpaid' => count(array_filter($reports, fn($r) => $r['status'] === 'Belum Bayar')),
        ];

        $filename = 'laporan_pemesanan_' . date('Ymd_His') . '.pdf';

        try {
            $pdf = Pdf::loadView('admin.reports.pdf', compact('reports', 'summary'));
            $pdf->setPaper('a4', 'portrait');
            return $pdf->download($filename);
        } catch (\Throwable $e) {
            // fallback: redirect back with error message
            return redirect()->route('admin.reports.index')
                ->with('error', 'Gagal membuat PDF: ' . $e->getMessage());
        }
    }

    /**
     * Build a minimal PDF document (single page) containing the report lines.
     * This is a simple generator and intentionally minimal to avoid external deps.
     *
     * @param array $reports
     * @param array $summary
     * @return string PDF binary
     */


    /**
     * Generate N dummy report rows.
     *
     * @param int $n
     * @return array
     */
    private function getDummyReports(int $n = 20): array
    {
        $services = ['Pelatihan Tari Tradisional', 'Pembuatan Kostum', 'Pertunjukan', 'Sewa Alat', 'Workshop'];
        $names = ['Siti Nurhaliza', 'Budi Santoso', 'Andi Wijaya', 'Rina Permata', 'Dewi Lestari', 'Agus Salim', 'Wulan Sari'];
        $statuses = ['Lunas', 'Belum Bayar', 'Dibatalkan'];

        $rows = [];
        for ($i = 1; $i <= $n; $i++) {
            $rows[] = [
                'order_no' => sprintf('ORD-%s-%03d', date('Ymd'), $i),
                'customer' => $names[array_rand($names)],
                'service' => $services[array_rand($services)],
                'date' => date('Y-m-d', strtotime("-" . rand(0, 30) . " days")),
                'status' => $statuses[array_rand($statuses)],
                'total' => rand(0, 1) ? rand(300000, 1500000) : 0,
            ];
        }

        return $rows;
    }
}
