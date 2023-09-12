<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;


 class Posts extends Model{
    use HasFactory;

    protected $fillable= ['id','source','destination','time','date','contact','user_id'];

    public function scopeFilter($query, array $filters){
        
        if($filters['search'] ?? false){
            $query->where('source','like','%'. request('search').'%')
                  ->orwhere('destination','like','%'. request('search').'%')
                  ->orwhere('time','like','%'. request('search').'%')
                  ->orwhere('date','like','%'. request('search').'%');
        }
    }

    // Relationship to user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

 }