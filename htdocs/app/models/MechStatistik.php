<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class MechStatistik extends Eloquent {

	use SoftDeletingTrait;

  /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'mech_statistik';

  /**
   * Define attributes deleted_at of the data.
   *
   * @var string
   */
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'ip',
      'tanggal',
      'hits',
      'online'
  ];

  public static function init() {
    //$ip = $_SERVER['REMOTE_ADDR']; // Getting the user's computer IP
		$ip = csrf_token();
    $tanggal = date("y-m-d"); // Getting the current date
    $waktu  = time();
    $count = self::where('ip', $ip)->where('tanggal', $tanggal)->count();
    if($count == 0) {
      self::create([
        'ip' => $ip,
        'tanggal' => $tanggal,
        'hits' => 1,
        'online' => $waktu,
      ]);
    } else {
      $mech = self::select(['hits'])
                ->where('ip', $ip)->where('tanggal', $tanggal)->first();
      self::where('ip', $ip)->where('tanggal', $tanggal)
      ->update([
        'hits' => $mech->hits+1,
        'online' => $waktu,
      ]);
    }
  }

  public static function mechs() {
    $tanggal = date("y-m-d");
    $blan=date("Y-m");
    $thn=date("Y");

		$kemarin = self::whereRaw("tanggal = subdate('$tanggal',1)")->count();
    $bulan = self::whereRaw("tanggal LIKE '%$blan%'")->count();
    $tahunini = self::whereRaw("tanggal LIKE '%$thn%'")->count();
    $pengunjung = count(self::select(['ip'])->where('tanggal', "$tanggal")->groupBy('ip')->get());
    $totalpengunjung = self::count();
    $hits = self::where('tanggal', "$tanggal")->groupBy('tanggal')->sum('hits');
    $totalhits = self::sum('hits');
    $bataswaktu       = time() - 300;
    $pengunjungonline = self::whereRaw("online > '$bataswaktu'")->count();

    return array(
      'visit-yesterday' => $kemarin,
      'this-month' => $bulan,
      'this-year' => $tahunini,
      'visit-today' => $pengunjung,
      'total-visit' => $totalpengunjung,
      'hits' => $hits,
      'total-hits' => $totalhits,
      'online' => $pengunjungonline,
    );
  }
}
