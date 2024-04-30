<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

function CheckCardDisabled($card_name)
{
    $user_id = Auth::user()->id;

    switch ($card_name) {
        case 'entity':
            $value = DB::table('entities')
                ->where('user_id', $user_id)
                ->count();
            return $value > 0 ? true : 'disable-card';
            break;

        case 'election':
            $value = DB::table('elections')
                ->where('user_id', $user_id)
                ->count();
            return $value > 0 ? true : 'disable-card';
            break;

        case 'election_live':
            $value = DB::table('elections')
                ->where('user_id', $user_id)
                ->where('status', 3)
                ->count();
            return $value > 0 ? true : 'disable-card';
            break;

        case 'election_complete':
            $value = DB::table('elections')
                ->where('user_id', $user_id)
                ->where('status', 3)
                ->count();
            return $value > 0 ? true : 'disable-card';
            break;

        case 'ibc':
            $value = DB::table('resolutions')
                ->where('user_id', $user_id)
                ->count();
            return $value > 0 ? true : 'disable-card';
            break;

            case 'ibc_live':
                $value = DB::table('resolutions')
                    ->where('user_id', $user_id)
                    ->where('status', 3)
                    ->count();
                return $value > 0 ? true : 'disable-card';
                break;

                case 'ibc_complete':
                    $value = DB::table('resolutions')
                        ->where('user_id', $user_id)
                        ->where('status', 3)
                        ->count();
                    return $value > 0 ? true : 'disable-card';
                    break;

        case 'survey':
            $value = DB::table('surveys')
                ->where('user_id', $user_id)

                ->count();
            return $value > 0 ? true : 'disable-card';
            break;

        case 'survey_live':
            $value = DB::table('surveys')
                ->where('user_id', $user_id)
                ->where('status', 3)

                ->count();
            return $value > 0 ? true : 'disable-card';
            break;


        case 'survey_complete':
            $value = DB::table('surveys')
                ->where('user_id', $user_id)
                ->where('status', 3)
                ->count();
            return $value > 0 ? true : 'disable-card';
            break;

        default:
        return true;

            break;
    }
    return true;
}

    function clear_cache()
    {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return true;
    }