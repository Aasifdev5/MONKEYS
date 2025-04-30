@extends('master')

@section('content')
<div class="container mt-4">
    <form method="POST" action="{{ route('booking.submit', $room->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="date" value="{{ $date ?? now()->format('Y-m-d') }}">
        <input type="hidden" name="check_in" value="{{ $check_in ?? '2025-05-01' }}">
        <input type="hidden" name="check_out" value="{{ $check_out ?? '2025-05-03' }}">
        <input type="hidden" name="guests" value="{{ $guests ?? 2 }}">

        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-7">
                <!-- Your Trip -->
                <div class="card p-4 shadow-sm mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="fw-bold">Your trip</h3>
                        <button class="btn btn-link text-decoration-none">Edit</button>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/60" class="rounded me-3" alt="Property">
                        <div>
                            <h5 class="mb-0">{{ $room->title ?? 'Test Room' }}</h5>
                            <p class="text-muted mb-0">{{ $room->room_type ?? 'Farm stay' }} · ★ 4.87 (283 reviews)</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p><strong>Dates</strong> <span>{{ $check_in ?? '2025-05-01' }} - {{ $check_out ?? '2025-05-03' }}</span> <a href="#" class="text-decoration-none">Edit</a></p>
                        <p><strong>Guests</strong> <span>{{ $guests ?? 2 }} guest{{ ($guests ?? 2) > 1 ? 's' : '' }}</span> <a href="#" class="text-decoration-none">Edit</a></p>
                    </div>
                </div>

                <!-- QR & Upload -->
                <div class="card p-4 shadow-sm mb-4">
                    <h5 class="fw-bold mb-3">Scan QR to Pay</h5>
                    <div class="text-center mb-3">
                        <img src="{{ asset('images/qr-code.png') }}" class="img-fluid" style="max-width: 300px;">
                    </div>
                    <div class="mb-3">
                        <label for="proof" class="form-label">Upload Payment Proof</label>
                        <input type="file" name="proof" class="form-control" >
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="card p-4 shadow-sm mb-4">
                    <h5 class="fw-bold mb-3"> for your trip</h5>
                    <div class="mb-3">
                        <label>Message the host</label>
                        <p class="text-muted mb-2">Before you can continue, let your host know a little about your trip.</p>
                        <button type="button" class="btn btn-outline-dark btn-sm">Add</button>
                    </div>
                    <div class="mb-3">
                        <label>Phone number</label>
                        <p class="text-muted mb-2">Add and confirm your phone number to get trip updates.</p>
                        <button type="button" class="btn btn-outline-dark btn-sm">Add</button>
                    </div>

                    <!-- Policy -->
                    <h5 class="fw-bold mt-4">Cancellation policy</h5>
                    <p>This reservation is non-refundable. <a href="#" class="text-decoration-none">Learn more</a></p>

                    <h5 class="fw-bold mt-4">Ground rules</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i> Follow the house rules</li>
                        <li><i class="fas fa-check text-success me-2"></i> Treat your Host’s home like your own</li>
                    </ul>

                    <!-- Time Selection -->
                    <h5 class="fw-bold mt-4">Select Hours</h5>
                    <div class="mb-3">
                        <label class="form-label">Start Hour</label>
                        <select name="start_hour" class="form-control">
                            @for($hour = 0; $hour < 24; $hour++)
                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Hour</label>
                        <select name="end_hour" class="form-control">
                            @for($hour = 0; $hour < 24; $hour++)
                                <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>

            <!-- Right Column: Pricing Summary -->
            <div class="col-lg-5">
                <div class="card p-4 shadow-sm sticky-top" style="top: 90px;">
                    <h5 class="fw-bold">Your total</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <p>₹6,276 x 5 nights</p>
                        <p>₹31,380</p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p>Taxes</p>
                        <p>₹3,765.6</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h6>Total (INR)</h6>
                        <h6>₹35,145.6</h6>
                    </div>
                    <p class="text-muted text-center mt-2">Price breakdown</p>

                    <!-- Submit -->
                    <p class="text-muted mt-4">The Host will need to accept this request. You'll pay now, but will get a full refund if not confirmed within 24 hours.</p>
                    <button type="submit" class="btn btn-primary w-100 mb-2" style="background-color: #ff385c; border-color: #ff385c;">
                        Request to book
                    </button>
                    <p class="text-muted text-center">
                        By selecting the button, I agree to the Host’s House Rules, 🐵 MONKEYS Booking’s Refund Policy, and damage responsibility terms.
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
