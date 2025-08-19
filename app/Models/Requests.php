<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property string $name
 * @property string $goal
 * @property string $email
 * @property string|null $company_name
 * @property string|null $website
 * @property int|null $employees
 * @property string|null $location
 * @property string|null $phone
 * @property string|null $challenge
 * @property string|null $comments
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereChallenge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereEmployees($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Requests whereWebsite($value)
 * @mixin \Eloquent
 */
class Requests extends Model {
    protected $fillable = [
        'name',
        'goal',
        'email',
        'company_name',
        'website',
        'employees',
        'location',
        'phone',
        'challenge',
        'comments'
    ];
    protected $casts = ['employees' => 'integer'];
    const STATUS_PENDING = 'pending';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    protected $attributes = ['status' => self::STATUS_PENDING];
    /**
     * Get available status options
     */
    public static function getStatusOptions(): array {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_IN_PROGRESS => 'In Progress',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_CANCELLED => 'Cancelled'
        ];
    }
    /**
     * Get status badge class for UI
     */
    public function getStatusBadgeClass(): string {
        return match($this->status) {
            self::STATUS_PENDING => 'badge-warning',
            self::STATUS_IN_PROGRESS => 'badge-info',
            self::STATUS_COMPLETED => 'badge-success',
            self::STATUS_CANCELLED => 'badge-danger',
            default => 'badge-secondary'
        };
    }
}