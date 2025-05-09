<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generalSettings = Setting::where('group', 'general')->get();
        $blogSettings = Setting::where('group', 'blog')->get();
        $captchaSettings = Setting::where('group', 'captcha')->get();

        return view('admin.settings.index', compact('generalSettings', 'blogSettings', 'captchaSettings'));
    }

    /**
     * Update the specified settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'site_logo' => 'nullable|string',
            'site_favicon' => 'nullable|string',
            'site_email' => 'nullable|email',
            'site_phone' => 'nullable|string',
            'site_address' => 'nullable|string',
            'social_facebook' => 'nullable|string',
            'social_twitter' => 'nullable|string',
            'social_instagram' => 'nullable|string',
            'social_linkedin' => 'nullable|string',
            'social_youtube' => 'nullable|string',
            'blog_comments_enabled' => 'boolean',
            'blog_auto_approve_comments' => 'boolean',
            'captcha_enabled' => 'boolean',
            'captcha_on_login' => 'boolean',
            'captcha_type' => 'nullable|string|in:recaptcha,hcaptcha,turnstile',
            'captcha_site_key' => 'nullable|string',
            'captcha_secret_key' => 'nullable|string',
        ]);

        // General Settings
        Setting::setValue('site_name', $request->site_name, 'general');
        Setting::setValue('site_description', $request->site_description, 'general');
        Setting::setValue('site_logo', $request->site_logo, 'general');
        Setting::setValue('site_favicon', $request->site_favicon, 'general');
        Setting::setValue('site_email', $request->site_email, 'general');
        Setting::setValue('site_phone', $request->site_phone, 'general');
        Setting::setValue('site_address', $request->site_address, 'general');

        // Social Media Settings
        Setting::setValue('social_facebook', $request->social_facebook, 'general');
        Setting::setValue('social_twitter', $request->social_twitter, 'general');
        Setting::setValue('social_instagram', $request->social_instagram, 'general');
        Setting::setValue('social_linkedin', $request->social_linkedin, 'general');
        Setting::setValue('social_youtube', $request->social_youtube, 'general');

        // Blog Settings
        Setting::setValue('blog_comments_enabled', $request->has('blog_comments_enabled') ? 1 : 0, 'blog');
        Setting::setValue('blog_auto_approve_comments', $request->has('blog_auto_approve_comments') ? 1 : 0, 'blog');

        // Captcha Settings
        Setting::setValue('captcha_enabled', $request->has('captcha_enabled') ? 1 : 0, 'captcha');
        Setting::setValue('captcha_on_login', $request->has('captcha_on_login') ? 1 : 0, 'captcha');
        Setting::setValue('captcha_type', $request->captcha_type, 'captcha');
        Setting::setValue('captcha_site_key', $request->captcha_site_key, 'captcha');
        Setting::setValue('captcha_secret_key', $request->captcha_secret_key, 'captcha');

        // Clear cache
        Cache::forget('settings');

        return redirect()->route('admin.settings.index')
            ->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
