@php
    $type = 'full-view';
@endphp
@extends('backend.master.index')

@section('title', 'ROOMS AND BEDS')

@section('breadcrumbs')
    <span>TRANSACTION / NURSE STATION </span> / <span class="highlight">ROOMS AND BEDS</span>
@endsection

@section('content')
<div class="row" style="height: 100%;">
    <div class="col-md-12" style="height: 100%;">
        <div class="floor-list" style="height: 100%;">
            <h3>FLOOR LIST</h3>
            <div class="row">
                <div class="col-2">
                    <button class="floor-item active">1ST FLOOR</button>
                </div>
                <div class="col-2">
                    <button class="floor-item">2ND FLOOR</button>
                </div>
                <div class="col-2">
                    <button class="floor-item">3RD FLOOR</button>
                </div>
                <div class="col-2">
                    <button class="floor-item">4TH FLOOR</button>
                </div>
                <div class="col-2">
                    <button class="floor-item">5TH FLOOR</button>
                </div>
                <div class="col-2">
                    <button class="floor-item">6TH FLOOR</button>
                </div>
            </div>
            <br>
            <div class="row" style="height: calc(100% - 123px);">
                <div class="col-3" style="height: 100%;">
                    <h3>ROOM LIST</h3>
                    <ul class="room-list">
                        <li>
                            <button class="room-item active">ROOM 101</button>
                        </li>
                        <li>
                            <button class="room-item">ROOM 102</button>
                        </li>
                        <li>
                            <button class="room-item">ROOM 103</button>
                        </li>
                        <li>
                            <button class="room-item">ROOM 104</button>
                        </li>
                        <li>
                            <button class="room-item">ROOM 105</button>
                        </li>
                        <li>
                            <button class="room-item">ROOM 106</button>
                        </li>
                    </ul>
                </div>
                <div class="col-9" style="overflow: auto; overflow-x:hidden !important; height: 100%;">
                    <h3>BED LIST</h3>
                    <div class="row">
                        <div class="col-4">
                            <div class="bed-list occupied">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bed-data bed-number">BED NUMBER: 1</div>
                                        <div class="bed-data patient-details">
                                            <ul>
                                                <li>PATIENT NUMBER: PATIENT-00001</li>
                                                <li>PATIENT NUMBER: JUAN DELA CRUZ</li>
                                                <li>ROOM STATUS: <span class="room-status occupied">OCCUPIED</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="bed-list vacant">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bed-data bed-number">BED NUMBER: 2</div>
                                        <div class="bed-data patient-details">
                                            <ul>
                                                <li>PATIENT NUMBER: --</li>
                                                <li>PATIENT NUMBER: --</li>
                                                <li>ROOM STATUS: <span class="room-status occupied">VACANT</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="bed-list vacant">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bed-data bed-number">BED NUMBER: 3</div>
                                        <div class="bed-data patient-details">
                                            <ul>
                                                <li>PATIENT NUMBER: --</li>
                                                <li>PATIENT NUMBER: --</li>
                                                <li>ROOM STATUS: <span class="room-status occupied">VACANT</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="bed-list occupied">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bed-data bed-number">BED NUMBER: 4</div>
                                        <div class="bed-data patient-details">
                                            <ul>
                                                <li>PATIENT NUMBER: PATIENT-00004</li>
                                                <li>PATIENT NUMBER: JOSHUA OPINION</li>
                                                <li>ROOM STATUS: <span class="room-status occupied">OCCUPIED</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="bed-list vacant">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bed-data bed-number">BED NUMBER: 5</div>
                                        <div class="bed-data patient-details">
                                            <ul>
                                                <li>PATIENT NUMBER: --</li>
                                                <li>PATIENT NUMBER: --</li>
                                                <li>ROOM STATUS: <span class="room-status occupied">VACANT</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="bed-list vacant">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bed-data bed-number">BED NUMBER: 6</div>
                                        <div class="bed-data patient-details">
                                            <ul>
                                                <li>PATIENT NUMBER: --</li>
                                                <li>PATIENT NUMBER: --</li>
                                                <li>ROOM STATUS: <span class="room-status occupied">VACANT</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="bed-list occupied">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bed-data bed-number">BED NUMBER: 7</div>
                                        <div class="bed-data patient-details">
                                            <ul>
                                                <li>PATIENT NUMBER: PATIENT-00002</li>
                                                <li>PATIENT NUMBER: ARVIN OLIVAS</li>
                                                <li>ROOM STATUS: <span class="room-status occupied">OCCUPIED</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="bed-list occupied">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bed-data bed-number">BED NUMBER: 8</div>
                                        <div class="bed-data patient-details">
                                            <ul>
                                                <li>PATIENT NUMBER: PATIENT-00003</li>
                                                <li>PATIENT NUMBER: JUDE MUEGO</li>
                                                <li>ROOM STATUS: <span class="room-status occupied">OCCUPIED</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="bed-list occupied">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bed-data bed-number">BED NUMBER: 9</div>
                                        <div class="bed-data patient-details">
                                            <ul>
                                                <li>PATIENT NUMBER: PATIENT-00003</li>
                                                <li>PATIENT NUMBER: JETRO MACALIPAY</li>
                                                <li>ROOM STATUS: <span class="room-status occupied">OCCUPIED</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('sc-modal')
@parent

@endsection
@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="/js/backend/pages/hms/transaction/nurse_station/room_beds.js"></script>
@endsection

@section('styles')
<link href="{{asset('/css/custom/transaction/nurse_station/rooms_beds.css')}}" rel="stylesheet">
@endsection