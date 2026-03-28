@extends('admin.layout.master')

@section('title', 'Promo Code Management')

@push('styles')
<style>
/* Promo Management Specific Styles */
.promo-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.promo-title {
    font-size: 24px;
    font-weight: 800;
    color: #111;
    margin: 0;
}

.promo-top-actions {
    display: flex;
    gap: 12px;
}

.promo-search-container {
    margin-bottom: 24px;
}

.promo-search-bar {
    position: relative;
    max-width: 400px;
}

.promo-search-bar input {
    height: 48px;
    border-radius: 999px;
    background: #F2F2F4;
    border: 0;
    padding-left: 56px;
    padding-right: 20px;
    font-size: 14px;
    color: #6B7280;
    width: 100%;
}

.promo-search-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    width: 36px;
    height: 36px;
    background: #fff;
    border: 2px solid #E5E7EB;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FF161F;
}

/* Table Design */
.promo-card {
    background: #fff;
    border-radius: 20px;
    border: 1px solid #F1F1F1;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.02);
}

.promo-table {
    width: 100%;
    border-collapse: collapse;
}

.promo-table thead tr {
    background: #FDEBED;
}

.promo-table th {
    padding: 16px 20px;
    font-size: 13px;
    font-weight: 700;
    color: #111;
    text-align: left;
}

.promo-table td {
    padding: 18px 20px;
    font-size: 13px;
    color: #6B7280;
    border-bottom: 1px solid #F9FAFB;
    vertical-align: middle;
}

.promo-code-text {
    font-weight: 700;
    color: #374151;
}

/* Badges */
.badge-promo {
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 700;
    text-transform: capitalize;
    display: inline-block;
}

.badge-active {
    background: #D1FAE5;
    color: #059669;
}

.badge-inactive {
    background: #FEE2E2;
    color: #DC2626;
}

/* Actions */
.promo-actions {
    display: flex;
    gap: 12px;
}

.promo-action-btn {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 16px;
}

.promo-edit { color: #10B981; }
.promo-delete { color: #FF161F; }

/* Pagination */
.promo-pagination {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 8px;
    margin-top: 24px;
}

.pg-btn {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 1px solid #EEE;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    color: #6B7280;
    text-decoration: none;
}

.pg-num {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: #FDEBED;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    color: #111;
    text-decoration: none;
}

.pg-num.active {
    outline: 2.5px solid #FF161F;
    outline-offset: -2.5px;
    background: #fff;
    font-weight: 800;
}

.date-filter-display {
    border: 1px solid #EEE;
    border-radius: 12px;
    padding: 8px 16px;
    background: #fff;
    font-size: 13px;
    color: #374151;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.date-filter-display i {
    color: #FF161F;
}

/* Form Styles */
.promo-back-btn {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    background: #fff;
    border: 1.5px solid #EEE;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #111;
    font-size: 18px;
    cursor: pointer;
    transition: background 0.2s;
}

.promo-back-btn:hover {
    background: #F9FAFB;
}

.form-section-header {
    background: #FF161F;
    color: #fff;
    padding: 12px 20px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 700;
}

.promo-label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
}

.promo-input {
    width: 100%;
    height: 48px;
    border-radius: 12px;
    border: 1.5px solid #EEE;
    padding: 0 16px;
    font-size: 14px;
    color: #111;
    outline: none;
    transition: border-color 0.2s;
}

.promo-input:focus {
    border-color: #FF161F;
}

.promo-input-with-icon {
    position: relative;
}

.promo-input-with-icon i {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #111;
    font-size: 18px;
    pointer-events: none;
}

</style>
@endpush

@section('content')
<div class="col-12">
    
    {{-- =====================================================================
         LIST VIEW
    ====================================================================== --}}
    <div id="promo-list-view">
        <div class="promo-header">
            <h1 class="promo-title">Promo Code Management</h1>
            <div class="promo-top-actions">
                <button class="btn btn-riden-danger" onclick="togglePromoView('add')">
                    <i class="bi bi-plus-circle-fill"></i> Add new Code
                </button>
                <div class="date-filter-display">
                    <i class="bi bi-calendar3"></i>
                    23/04/2025 - 23/04/2025
                </div>
            </div>
        </div>

        <div class="promo-search-container">
            <div class="promo-search-bar">
                <div class="promo-search-icon">
                    <i class="bi bi-search"></i>
                </div>
                <input type="text" placeholder="Search by code or date">
            </div>
        </div>

        <div class="promo-card">
            <table class="promo-table">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Discount %</th>
                        <th>Starting Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $promos = [
                            ['code' => '43562783', 'discount' => '20%', 'start' => 'March 24, 2024', 'end' => 'July 24, 2024', 'status' => 'active'],
                            ['code' => '43562783', 'discount' => '20%', 'start' => 'March 24, 2024', 'end' => 'July 24, 2024', 'status' => 'inactive'],
                            ['code' => '43562783', 'discount' => '20%', 'start' => 'March 24, 2024', 'end' => 'July 24, 2024', 'status' => 'active'],
                            ['code' => '43562783', 'discount' => '20%', 'start' => 'March 24, 2024', 'end' => 'July 24, 2024', 'status' => 'active'],
                            ['code' => '43562783', 'discount' => '20%', 'start' => 'March 24, 2024', 'end' => 'July 24, 2024', 'status' => 'active'],
                            ['code' => '43562783', 'discount' => '20%', 'start' => 'March 24, 2024', 'end' => 'July 24, 2024', 'status' => 'active'],
                            ['code' => '43562783', 'discount' => '20%', 'start' => 'March 24, 2024', 'end' => 'July 24, 2024', 'status' => 'inactive'],
                            ['code' => '43562783', 'discount' => '20%', 'start' => 'March 24, 2024', 'end' => 'July 24, 2024', 'status' => 'inactive'],
                            ['code' => '43562783', 'discount' => '20%', 'start' => 'March 24, 2024', 'end' => 'July 24, 2024', 'status' => 'active'],
                            ['code' => '43562783', 'discount' => '20%', 'start' => 'March 24, 2024', 'end' => 'July 24, 2024', 'status' => 'active'],
                        ];
                    @endphp

                    @foreach($promos as $promo)
                    <tr>
                        <td><span class="promo-code-text">{{ $promo['code'] }}</span></td>
                        <td>{{ $promo['discount'] }}</td>
                        <td>{{ $promo['start'] }}</td>
                        <td>{{ $promo['end'] }}</td>
                        <td>
                            <span class="badge-promo badge-{{ $promo['status'] }}">
                                {{ $promo['status'] }}
                            </span>
                        </td>
                        <td>
                            <div class="promo-actions">
                                <a href="javascript:void(0)" class="promo-action-btn promo-edit" title="Edit" onclick="togglePromoView('edit', {code: '{{ $promo['code'] }}', discount: '{{ $promo['discount'] }}', start: '{{ $promo['start'] }}', end: '{{ $promo['end'] }}', upto: '30%'})">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="#" class="promo-action-btn promo-delete" title="Delete">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="promo-pagination">
            <a href="#" class="pg-btn"><i class="bi bi-chevron-left"></i></a>
            <a href="#" class="pg-num active">1</a>
            <a href="#" class="pg-num">2</a>
            <a href="#" class="pg-num">3</a>
            <span class="pg-dots">...</span>
            <a href="#" class="pg-num">5</a>
            <a href="#" class="pg-btn is-primary"><i class="bi bi-chevron-right"></i></a>
        </div>
    </div>

    {{-- =====================================================================
         ADD/EDIT VIEW
    ====================================================================== --}}
    <div id="promo-form-view" style="display: none;">
        <div class="promo-header mb-4">
            <h1 class="promo-title">Promo Code Management</h1>
        </div>

        <div class="d-flex align-items-center gap-3 mb-4">
            <button class="promo-back-btn" onclick="togglePromoView('list')">
                <i class="bi bi-chevron-left"></i>
            </button>
            <h2 id="promo-form-title" class="m-0" style="font-size: 20px; font-weight: 800; color: #111;">Add New promo Code</h2>
        </div>

        <div class="promo-card p-4">
            <div class="form-section-header mb-4">Code Details</div>
            
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label class="promo-label">Code</label>
                    <input type="text" id="pc-code" class="promo-input" placeholder="Enter Code">
                </div>
                <div class="col-md-6">
                    <label class="promo-label">Discount Percentage</label>
                    <input type="text" id="pc-discount" class="promo-input" placeholder="Enter Discount Percentage">
                </div>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <label class="promo-label">Upto Discount</label>
                    <input type="text" id="pc-upto" class="promo-input" placeholder="30%">
                </div>
            </div>

            <div class="form-section-header mb-4">Date Management</div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label class="promo-label">Starting Date</label>
                    <div class="promo-input-with-icon">
                        <input type="text" id="pc-start" class="promo-input" placeholder="22/04/2024">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="promo-label">End Date</label>
                    <div class="promo-input-with-icon">
                        <input type="text" id="pc-end" class="promo-input" placeholder="22/05/2025">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-3 mt-4">
            <button class="btn btn-riden-danger px-5" style="height: 48px; min-width: 160px; font-size: 15px;">Save</button>
            <button class="btn btn-riden-outline px-5" onclick="togglePromoView('list')" style="height: 48px; min-width: 160px; font-size: 15px; border: 1.5px solid #111;">Cancel</button>
        </div>
    </div>

</div>

@push('scripts')
<script>
    function togglePromoView(view, data = null) {
        const list = document.getElementById('promo-list-view');
        const formView = document.getElementById('promo-form-view');
        const title = document.getElementById('promo-form-title');
        
        if (view === 'list') {
            list.style.display = 'block';
            formView.style.display = 'none';
        } else {
            list.style.display = 'none';
            formView.style.display = 'block';
            
            if (view === 'add') {
                title.innerText = 'Add New promo Code';
                document.getElementById('pc-code').value = '';
                document.getElementById('pc-discount').value = '';
                document.getElementById('pc-upto').value = '';
                document.getElementById('pc-start').value = '';
                document.getElementById('pc-end').value = '';
            } else if (view === 'edit') {
                title.innerText = 'Edit Promo code Details';
                if (data) {
                    document.getElementById('pc-code').value = data.code || '5647387';
                    document.getElementById('pc-discount').value = data.discount || '20%';
                    document.getElementById('pc-upto').value = data.upto || '30%';
                    document.getElementById('pc-start').value = data.start || '22/04/2024';
                    document.getElementById('pc-end').value = data.end || '22/05/2025';
                }
            }
        }
        window.scrollTo(0, 0);
    }
</script>
@endpush
@endsection