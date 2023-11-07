@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Pilih Bulan</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/productivity-by-team" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-xl-6 col-md-6">
                                        <label class="form-label" for="id_proyek">Bulan</label>
                                        <input type="month" class="form-control" name="bulan"  @if($bulan === false)value="{{date('Y-m')}}"@elseif($bulan === true) value="{{$detailBulan}}" @endif required>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            @if ($detailBulan)
                                <div class="mt-3">
                                    <label>Productivity by Team di bulan <strong>{{date('F Y', strtotime($detailBulan))}}</strong></label>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($bulan === true)
    @foreach ($daftarKategoriPekerjaan as $item)
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{$item->fungsi}}</h4>
                        </div>
                    </div>
                    <div class="card-body" style="margin-bottom: -50px;">
                        <div class="row">

                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif


@endsection