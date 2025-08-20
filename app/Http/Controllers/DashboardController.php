<?php
namespace App\Http\Controllers;
use App\Models\Requests;
use Illuminate\View\View;
class DashboardController extends Controller {
    /**
     * Display the dashboard with requests overview
     */
    public function index(): View {
        $recentRequests = Requests::latest()->take(5)->get();// Get recent requests
        $totalRequests = Requests::count();// Get request statistics
        $pendingRequests = Requests::where('status', 'pending')->count();
        $completedRequests = Requests::where('status', 'completed')->count();
        $inProgressRequests = Requests::where('status', 'in_progress')->count();
        $requestsByMonth = Requests::selectRaw('MONTH(created_at) as month, COUNT(*) as count')->whereYear('created_at', date('Y'))->groupBy('month')->orderBy('month')->get();// Get requests by month for chart data
        return view('users.dashboard', compact('recentRequests', 'totalRequests', 'pendingRequests', 'completedRequests', 'inProgressRequests', 'requestsByMonth'));
    }
}