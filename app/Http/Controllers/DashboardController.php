<?php
namespace App\Http\Controllers;
use App\Models\Requests;
use Illuminate\View\View;
class DashboardController extends Controller {
    /**
     * Display the dashboard with requests overview
     */
    public function index(): View {
        $recentRequests = Requests::latest()->take(5)->get();
        $totalRequests = Requests::count();
        $pendingRequests = Requests::where('status', 'pending')->count();
        $completedRequests = Requests::where('status', 'completed')->count();
        $inProgressRequests = Requests::where('status', 'in_progress')->count();
        $requestsByMonth = Requests::selectRaw('COUNT(*) as count, strftime("%Y-%m", created_at) as month')->groupBy('month')->orderBy('month')->pluck('count', 'month');
        return view('users.dashboard', [
            'recentRequests' => $recentRequests,
            'totalRequests' => $totalRequests,
            'pendingRequests' => $pendingRequests,
            'completedRequests' => $completedRequests,
            'inProgressRequests' => $inProgressRequests,
            'requestsByMonth' => $requestsByMonth
        ]);
    }
}