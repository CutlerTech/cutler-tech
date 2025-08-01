<?php
namespace App\Http\Controllers;
use App\Models\Requests;
use Illuminate\View\View;
class DashboardController extends Controller {
    /**
     * Display the dashboard with requests overview
     */
    public function index(): View {
        // Get recent requests
        $recentRequests = Requests::latest()->take(5)->get();
        // Get request statistics
        $totalRequests = Requests::count();
        $pendingRequests = Requests::where('status', 'pending')->count();
        $completedRequests = Requests::where('status', 'completed')->count();
        $inProgressRequests = Requests::where('status', 'in_progress')->count();
        // Get requests by month for chart data
        $requestsByMonth = Requests::selectRaw('MONTH(created_at) as month, COUNT(*) as count')->whereYear('created_at', date('Y'))->groupBy('month')->orderBy('month')->get();
        return view('users.dashboard', compact('recentRequests', 'totalRequests', 'pendingRequests', 'completedRequests', 'inProgressRequests', 'requestsByMonth'));
    }
}