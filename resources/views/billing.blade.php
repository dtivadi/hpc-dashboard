@extends('layouts.app')
@section('content')

<h1 style="margin-bottom:24px; color:#1e293b;">Billing & Invoicing</h1>

{{-- Summary Cards --}}
<div style="display:flex; gap:16px; flex-wrap:wrap; margin-bottom:32px;">
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:10px; flex:1; min-width:160px;">
        <p style="margin:0 0 8px 0; font-size:13px; opacity:0.75;">Total Billed</p>
        <h2 style="margin:0; font-size:26px; font-weight:bold;">$27,660</h2>
        <p style="font-size:12px; opacity:0.7; margin-top:4px;">This year</p>
    </div>
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:10px; flex:1; min-width:160px;">
        <p style="margin:0 0 8px 0; font-size:13px; opacity:0.75;">Total Collected</p>
        <h2 style="margin:0; font-size:26px; font-weight:bold;">$24,380</h2>
        <p style="font-size:12px; opacity:0.7; margin-top:4px;">Payments received</p>
    </div>
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:10px; flex:1; min-width:160px;">
        <p style="margin:0 0 8px 0; font-size:13px; opacity:0.75;">Outstanding</p>
        <h2 style="margin:0; font-size:26px; font-weight:bold;">$3,280</h2>
        <p style="font-size:12px; opacity:0.7; margin-top:4px;">Pending payment</p>
    </div>
    <div style="background:#1e293b; color:#fff; padding:20px; border-radius:10px; flex:1; min-width:160px;">
        <p style="margin:0 0 8px 0; font-size:13px; opacity:0.75;">Invoices Issued</p>
        <h2 style="margin:0; font-size:26px; font-weight:bold;">47</h2>
        <p style="font-size:12px; opacity:0.7; margin-top:4px;">Total invoices</p>
    </div>
</div>

{{-- Invoice Table --}}
<div style="background:#fff; border-radius:10px; padding:24px;
            box-shadow:0 2px 8px rgba(0,0,0,0.08); margin-bottom:32px;">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
        <h3 style="margin:0; font-size:16px; color:#1e293b;">Invoice List</h3>
        <button style="background:#1e293b; color:#fff; border:none; padding:8px 16px;
                       border-radius:6px; cursor:pointer; font-size:13px;">
            + Generate Invoice
        </button>
    </div>

    <table style="width:100%; border-collapse:collapse; font-size:14px;">
        <thead>
            <tr style="background:#f8fafc;">
                <th style="padding:12px; text-align:left; border-bottom:2px solid #e2e8f0; color:#1e293b;">Invoice #</th>
                <th style="padding:12px; text-align:left; border-bottom:2px solid #e2e8f0; color:#1e293b;">User</th>
                <th style="padding:12px; text-align:left; border-bottom:2px solid #e2e8f0; color:#1e293b;">Service</th>
                <th style="padding:12px; text-align:left; border-bottom:2px solid #e2e8f0; color:#1e293b;">Amount</th>
                <th style="padding:12px; text-align:left; border-bottom:2px solid #e2e8f0; color:#1e293b;">Date</th>
                <th style="padding:12px; text-align:left; border-bottom:2px solid #e2e8f0; color:#1e293b;">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr style="border-bottom:1px solid #f1f5f9;">
                <td style="padding:12px; color:#64748b;">INV-001</td>
                <td style="padding:12px;">John Mutasa</td>
                <td style="padding:12px;">CPU Compute</td>
                <td style="padding:12px; font-weight:600;">$1,240</td>
                <td style="padding:12px; color:#64748b;">2026-05-01</td>
                <td style="padding:12px;">
                    <span style="background:#dcfce7; color:#16a34a; padding:4px 10px;
                                 border-radius:20px; font-size:12px; font-weight:600;">Paid</span>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #f1f5f9; background:#fafafa;">
                <td style="padding:12px; color:#64748b;">INV-002</td>
                <td style="padding:12px;">Sarah Chikwanda</td>
                <td style="padding:12px;">GPU Compute</td>
                <td style="padding:12px; font-weight:600;">$2,180</td>
                <td style="padding:12px; color:#64748b;">2026-05-03</td>
                <td style="padding:12px;">
                    <span style="background:#dcfce7; color:#16a34a; padding:4px 10px;
                                 border-radius:20px; font-size:12px; font-weight:600;">Paid</span>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #f1f5f9;">
                <td style="padding:12px; color:#64748b;">INV-003</td>
                <td style="padding:12px;">Peter Moyo</td>
                <td style="padding:12px;">Storage</td>
                <td style="padding:12px; font-weight:600;">$580</td>
                <td style="padding:12px; color:#64748b;">2026-05-07</td>
                <td style="padding:12px;">
                    <span style="background:#fef9c3; color:#ca8a04; padding:4px 10px;
                                 border-radius:20px; font-size:12px; font-weight:600;">Pending</span>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #f1f5f9; background:#fafafa;">
                <td style="padding:12px; color:#64748b;">INV-004</td>
                <td style="padding:12px;">Grace Banda</td>
                <td style="padding:12px;">CPU Compute</td>
                <td style="padding:12px; font-weight:600;">$960</td>
                <td style="padding:12px; color:#64748b;">2026-05-10</td>
                <td style="padding:12px;">
                    <span style="background:#fee2e2; color:#dc2626; padding:4px 10px;
                                 border-radius:20px; font-size:12px; font-weight:600;">Overdue</span>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #f1f5f9;">
                <td style="padding:12px; color:#64748b;">INV-005</td>
                <td style="padding:12px;">Takudzwa Nhete</td>
                <td style="padding:12px;">GPU Compute</td>
                <td style="padding:12px; font-weight:600;">$3,400</td>
                <td style="padding:12px; color:#64748b;">2026-05-15</td>
                <td style="padding:12px;">
                    <span style="background:#dcfce7; color:#16a34a; padding:4px 10px;
                                 border-radius:20px; font-size:12px; font-weight:600;">Paid</span>
                </td>
            </tr>
            <tr style="background:#fafafa;">
                <td style="padding:12px; color:#64748b;">INV-006</td>
                <td style="padding:12px;">Rudo Zvobgo</td>
                <td style="padding:12px;">Memory Allocation</td>
                <td style="padding:12px; font-weight:600;">$740</td>
                <td style="padding:12px; color:#64748b;">2026-05-20</td>
                <td style="padding:12px;">
                    <span style="background:#fef9c3; color:#ca8a04; padding:4px 10px;
                                 border-radius:20px; font-size:12px; font-weight:600;">Pending</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection