
<!-- ===== FOOTER ===== -->
<footer style="background:#0f1f12;color:white;padding:64px 24px 32px;">
    <div style="max-width:1200px;margin:0 auto;">
        <div style="display:grid;grid-template-columns:2fr 1fr 1fr;gap:48px;margin-bottom:48px;">
            <!-- Brand column -->
            <div>
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:16px;">
                    <svg width="30" height="30" viewBox="0 0 32 32" fill="none">
                        <circle cx="16" cy="16" r="16" fill="#2d7d2b"/>
                        <polyline points="7,22 13,9 17,17 20,12 25,22" fill="none" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="font-display" style="font-size:1.4rem;letter-spacing:.05em;">BUGYLY TRAIL</span>
                </div>
                <p style="color:rgba(255,255,255,.45);font-size:.82rem;line-height:1.8;max-width:280px;">
                    {{ __('Footer Brand Desc') }}
                </p>
                <!-- Social -->
                <div style="display:flex;gap:10px;margin-top:20px;">
                    <a href="https://instagram.com/bugyltrail" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;transition:background .2s;text-decoration:none;" onmouseover="this.style.background='#e1306c'" onmouseout="this.style.background='rgba(255,255,255,.1)'">
                        <svg width="15" height="15" fill="white" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="mailto:info@bugyltrail.kz" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;transition:background .2s;text-decoration:none;" onmouseover="this.style.background='#2d7d2b'" onmouseout="this.style.background='rgba(255,255,255,.1)'">
                        <svg width="15" height="15" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Event links -->
            <div>
                <h4 style="font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.12em;color:rgba(255,255,255,.35);margin-bottom:20px;">{{ __('Event') }}</h4>
                <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;">
                    <li><a href="#about" style="color:rgba(255,255,255,.65);font-size:.85rem;text-decoration:none;" onmouseover="this.style.color='#7ab878'" onmouseout="this.style.color='rgba(255,255,255,.65)'">{{ __('About the Race') }}</a></li>
                    <li><a href="#routes" style="color:rgba(255,255,255,.65);font-size:.85rem;text-decoration:none;" onmouseover="this.style.color='#7ab878'" onmouseout="this.style.color='rgba(255,255,255,.65)'">{{ __('Distances & Prices') }}</a></li>
                    <li><a href="#gallery" style="color:rgba(255,255,255,.65);font-size:.85rem;text-decoration:none;" onmouseover="this.style.color='#7ab878'" onmouseout="this.style.color='rgba(255,255,255,.65)'">{{ __('Photo Gallery') }}</a></li>
                    <li><a href="#partners" style="color:rgba(255,255,255,.65);font-size:.85rem;text-decoration:none;" onmouseover="this.style.color='#7ab878'" onmouseout="this.style.color='rgba(255,255,255,.65)'">{{ __('Partners') }}</a></li>
                    <li><a href="#" style="color:rgba(255,255,255,.65);font-size:.85rem;text-decoration:none;" onmouseover="this.style.color='#7ab878'" onmouseout="this.style.color='rgba(255,255,255,.65)'">{{ __('Results Archive') }}</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 style="font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.12em;color:rgba(255,255,255,.35);margin-bottom:20px;">{{ __('Contact') }}</h4>
                <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:14px;">
                    <li style="display:flex;align-items:center;gap:8px;">
                        <svg width="14" height="14" fill="none" stroke="#7ab878" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <a href="mailto:info@bugyltrail.kz" style="color:rgba(255,255,255,.65);font-size:.82rem;text-decoration:none;">info@bugyltrail.kz</a>
                    </li>
                    <li style="display:flex;align-items:center;gap:8px;">
                        <svg width="14" height="14" fill="none" stroke="#7ab878" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"/><circle cx="12" cy="12" r="4" stroke-width="2"/><circle cx="17.5" cy="6.5" r="1" fill="#7ab878" stroke="none"/></svg>
                        <a href="https://instagram.com/bugyltrail" style="color:rgba(255,255,255,.65);font-size:.82rem;text-decoration:none;">@bugyltrail</a>
                    </li>
                    <li style="display:flex;align-items:flex-start;gap:8px;">
                        <svg width="14" height="14" fill="none" stroke="#7ab878" viewBox="0 0 24 24" style="margin-top:2px;flex-shrink:0;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span style="color:rgba(255,255,255,.65);font-size:.82rem;line-height:1.5;">{{ __('Bugyly Mountains, Kazakhstan') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div style="border-top:1px solid rgba(255,255,255,.1);padding-top:28px;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:16px;">
            <p style="color:rgba(255,255,255,.3);font-size:.75rem;margin:0;">© 2025 Bugyly Trail. {{ __('All rights reserved.') }}</p>
            <div style="display:flex;gap:24px;flex-wrap:wrap;">
                <a href="#" style="color:rgba(255,255,255,.35);font-size:.75rem;text-decoration:none;" onmouseover="this.style.color='#7ab878'" onmouseout="this.style.color='rgba(255,255,255,.35)'">{{ __('Privacy Policy') }}</a>
                <a href="#" style="color:rgba(255,255,255,.35);font-size:.75rem;text-decoration:none;" onmouseover="this.style.color='#7ab878'" onmouseout="this.style.color='rgba(255,255,255,.35)'">{{ __('Terms of Participation') }}</a>
                <a href="#" style="color:rgba(255,255,255,.35);font-size:.75rem;text-decoration:none;" onmouseover="this.style.color='#7ab878'" onmouseout="this.style.color='rgba(255,255,255,.35)'">{{ __('Cookie Settings') }}</a>
            </div>
        </div>
    </div>
</footer>
