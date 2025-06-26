<div class="card">
                <div class="card-header">
                    <h2>Quick Stats</h2>
                </div>
                <div class="form-row">
                    <div class="card" style="flex: 1; text-align: center;">
                        <h3>Jumlah Pengguna</h3>
                        <p style="font-size: 2rem; font-weight: bold; color: var(--primary-color);">{{$user}}</p>
                    </div>
                    <div class="card" style="flex: 1; text-align: center;">
                        <h3>Jumlah Buku</h3>
                        <p style="font-size: 2rem; font-weight: bold; color: var(--success-color);">{{$book}}</p>
                    </div>
                    <div class="card" style="flex: 1; text-align: center;">
                        <h3>Sedang Dipinjam</h3>
                        <p style="font-size: 2rem; font-weight: bold; color: var(--warning-color);">{{$borrow}}</p>
                    </div>
                    <div class="card" style="flex: 1; text-align: center;">
                        <h3>Sudah Dikembalikan</h3>
                        <p style="font-size: 2rem; font-weight: bold; color: var(--warning-color);">{{$returned}}</p>
                    </div>
                </div>
            </div>