@extends('layout')

@section('title', 'แจ้งเคลมสินค้าชำรุด')

@section('content')
<style>
    body {
        background-color: #f8fafc;
        font-family: 'Inter', 'Noto Sans Thai', sans-serif;
    }
    .card-claim {
        border: none;
        border-radius: 16px;
        background: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .card-claim:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
    }
    .gradient-header {
        background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
        color: white;
        padding: 30px 20px;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .gradient-header h2 {
        font-weight: 700;
        margin: 0;
        font-size: 1.75rem;
        letter-spacing: -0.5px;
    }
    .gradient-header p {
        margin: 8px 0 0 0;
        opacity: 0.9;
        font-size: 0.95rem;
    }
    .form-container {
        padding: 40px;
    }
    .form-label {
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 1rem;
        color: #1e293b;
        transition: all 0.25s ease-in-out;
    }
    .form-control:focus, .form-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        outline: none;
    }
    .form-control.is-invalid, .form-select.is-invalid {
        border-color: #ef4444;
        background-image: none; /* Hide default bootstrap icon to keep clean visual style */
    }
    .form-control.is-invalid:focus, .form-select.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.15);
    }
    .invalid-feedback-custom {
        color: #ef4444;
        font-size: 0.85rem;
        font-weight: 500;
        margin-top: 6px;
        display: flex;
        align-items: center;
    }
    .invalid-feedback-custom::before {
        content: "⚠️ ";
        margin-right: 4px;
        font-size: 0.9rem;
    }
    .btn-submit {
        background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
        border: none;
        color: white;
        padding: 14px 28px;
        font-weight: 600;
        border-radius: 10px;
        width: 100%;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);
    }
    .btn-submit:hover {
        background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.35);
    }
    .btn-submit:active {
        transform: translateY(1px);
    }
    .success-card {
        background-color: #f0fdf4;
        border: 2px solid #bbf7d0;
        border-radius: 12px;
        padding: 24px;
        margin-bottom: 30px;
        animation: fadeIn 0.5s ease-out;
    }
    .success-card h4 {
        color: #166534;
        font-weight: 700;
        margin-bottom: 12px;
    }
    .success-data-list {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 16px;
        margin-top: 15px;
    }
    .success-data-item {
        display: flex;
        border-bottom: 1px solid #f1f5f9;
        padding: 8px 0;
    }
    .success-data-item:last-child {
        border-bottom: none;
    }
    .success-data-label {
        font-weight: 600;
        width: 180px;
        color: #475569;
    }
    .success-data-value {
        color: #0f172a;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-7">
        
        @if(session('success'))
            <div class="success-card">
                <div class="d-flex align-items-center mb-3">
                    <span class="fs-3 me-2">✅</span>
                    <h4 class="mb-0">{{ session('success') }}</h4>
                </div>
                <p class="text-secondary mb-0">ข้อมูลที่ได้รับการลงทะเบียนในระบบเรียบร้อยมีดังนี้:</p>
                
                @if(session('claim_data'))
                    <div class="success-data-list">
                        <div class="success-data-item">
                            <span class="success-data-label">รหัสสินค้า (Serial Number):</span>
                            <span class="success-data-value font-monospace">{{ session('claim_data')['serial_number'] }}</span>
                        </div>
                        <div class="success-data-item">
                            <span class="success-data-label">อีเมลผู้ติดต่อ:</span>
                            <span class="success-data-value">{{ session('claim_data')['email'] }}</span>
                        </div>
                        <div class="success-data-item">
                            <span class="success-data-label">อาการชำรุด:</span>
                            <span class="success-data-value text-wrap">{{ session('claim_data')['defect_description'] }}</span>
                        </div>
                        <div class="success-data-item">
                            <span class="success-data-label">ระดับความเร่งด่วน:</span>
                            <span class="success-data-value">
                                @if(session('claim_data')['urgency'] == 'low')
                                    <span class="badge bg-secondary">ต่ำ (Low)</span>
                                @elseif(session('claim_data')['urgency'] == 'medium')
                                    <span class="badge bg-warning text-dark">ปานกลาง (Medium)</span>
                                @elseif(session('claim_data')['urgency'] == 'high')
                                    <span class="badge bg-danger">สูง (High)</span>
                                @endif
                            </span>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <div class="card card-claim">
            <div class="gradient-header">
                <h2>Product Claim Form</h2>
                <p>แบบฟอร์มส่งข้อมูลแจ้งเคลมสินค้าชำรุด</p>
            </div>
            
            <div class="form-container">
                <form action="{{ route('claim.submit') }}" method="POST" novalidate>
                    @csrf
                    
                    <!-- Serial Number -->
                    <div class="mb-4">
                        <label for="serial_number" class="form-label">รหัสสินค้า (Serial Number)</label>
                        <input type="text" 
                               id="serial_number" 
                               name="serial_number" 
                               class="form-control @error('serial_number') is-invalid @enderror" 
                               placeholder="กรอกรหัสสินค้าเป็นตัวเลขหรือตัวอักษร 5-20 หลัก" 
                               value="{{ old('serial_number') }}">
                        @error('serial_number')
                            <div class="invalid-feedback-custom">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Contact Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label">อีเมลผู้ติดต่อ</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               placeholder="example@yourdomain.com" 
                               value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback-custom">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Defect Description -->
                    <div class="mb-4">
                        <label for="defect_description" class="form-label">อาการชำรุด</label>
                        <textarea id="defect_description" 
                                  name="defect_description" 
                                  rows="4" 
                                  class="form-control @error('defect_description') is-invalid @enderror" 
                                  placeholder="ระบุรายละเอียดอาการชำรุดของสินค้าอย่างละเอียด (อย่างน้อย 10 ตัวอักษร)">{{ old('defect_description') }}</textarea>
                        @error('defect_description')
                            <div class="invalid-feedback-custom">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Urgency Level -->
                    <div class="mb-5">
                        <label for="urgency" class="form-label">ระดับความเร่งด่วน</label>
                        <select id="urgency" 
                                name="urgency" 
                                class="form-select @error('urgency') is-invalid @enderror">
                            <option value="" disabled {{ old('urgency') === null ? 'selected' : '' }}>-- กรุณาเลือกความเร่งด่วน --</option>
                            <option value="low" {{ old('urgency') === 'low' ? 'selected' : '' }}>ต่ำ (Low)</option>
                            <option value="medium" {{ old('urgency') === 'medium' ? 'selected' : '' }}>ปานกลาง (Medium)</option>
                            <option value="high" {{ old('urgency') === 'high' ? 'selected' : '' }}>สูง (High)</option>
                        </select>
                        @error('urgency')
                            <div class="invalid-feedback-custom">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-submit">
                        ส่งข้อมูลการแจ้งเคลม
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection
