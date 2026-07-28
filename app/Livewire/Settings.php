<?php

namespace App\Livewire;

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.dashboard')]
class Settings extends Component
{
    use WithFileUploads;

    public ?Setting $setting = null;

    public string $fa_website_name = '';
    public string $fa_website_description = '';

    public string $en_website_name = '';
    public string $en_website_description = '';

    public $logo_src;
    public $favicon;
    public $footer_logo;

    public string $email = '';
    public string $phone = '';
    public string $mobile = '';
    public string $fa_address = '';
    public string $en_address = '';

    public string $instagram = '';
    public string $telegram = '';
    public string $linkedin = '';
    public string $whatsapp = '';

    public ?string $current_logo = null;
    public ?string $current_favicon = null;
    public ?string $current_footer_logo = null;

    protected function rules(): array
    {
        return [
            'fa_website_name'        => 'required|string|max:255',
            'fa_website_description' => 'nullable|string',
            'en_website_name'        => 'required|string|max:255',
            'en_website_description' => 'nullable|string',

            'email'               => 'nullable|email',
            'phone'               => 'nullable|string|max:20',
            'mobile'              => 'nullable|string|max:20',
            'fa_address'             => 'nullable|string',
            'en_address'             => 'nullable|string',

            'instagram'           => 'nullable|string|max:255',
            'telegram'            => 'nullable|string|max:255',
            'linkedin'            => 'nullable|string|max:255',
            'whatsapp'            => 'nullable|string|max:255',

            'logo_src'            => 'nullable|image|max:200048',
            'favicon'             => 'nullable|image|max:1000204',
            'footer_logo'         => 'nullable|image|max:200048',
        ];
    }


    public function mount()
    {
        $setting = Setting::first();

        if (!$setting) {
            return;
        }

        $this->setting = $setting;

        $this->fa_website_name = $setting->fa_website_name;
        $this->fa_website_description = $setting->fa_website_description;

        $this->en_website_name = $setting->en_website_name;
        $this->en_website_description = $setting->en_website_description;

        $this->email = $setting->email;
        $this->phone = $setting->phone;
        $this->mobile = $setting->mobile;

        $this->fa_address = $setting->fa_address;
        $this->en_address = $setting->en_address;

        $this->instagram = $setting->instagram;
        $this->telegram = $setting->telegram;
        $this->linkedin = $setting->linkedin;
        $this->whatsapp = $setting->whatsapp;

        $this->current_logo = $setting->logo_src;
        $this->current_favicon = $setting->favicon;
        $this->current_footer_logo = $setting->footer_logo;
    }

    public function save()
    {
        $this->validate();

        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $setting->fa_website_name = $this->fa_website_name;
        $setting->fa_website_description = $this->fa_website_description;

        $setting->en_website_name = $this->en_website_name;
        $setting->en_website_description = $this->en_website_description;

        $setting->email = $this->email;
        $setting->phone = $this->phone;
        $setting->mobile = $this->mobile;

        $setting->fa_address = $this->fa_address;
        $setting->en_address = $this->en_address;

        $setting->instagram = $this->instagram;
        $setting->telegram = $this->telegram;
        $setting->linkedin = $this->linkedin;
        $setting->whatsapp = $this->whatsapp;

        if ($this->logo_src) {

            if ($setting->logo_src && Storage::disk('public')->exists($setting->logo_src)) {
                Storage::disk('public')->delete($setting->logo_src);
            }

            $setting->logo_src = $this->logo_src->store('settings', 'public');
        }

        if ($this->favicon) {

            if ($setting->favicon && Storage::disk('public')->exists($setting->favicon)) {
                Storage::disk('public')->delete($setting->favicon);
            }

            $setting->favicon = $this->favicon->store('settings', 'public');
        }

        if ($this->footer_logo) {

            if ($setting->footer_logo && Storage::disk('public')->exists($setting->footer_logo)) {
                Storage::disk('public')->delete($setting->footer_logo);
            }

            $setting->footer_logo = $this->footer_logo->store('settings', 'public');
        }

        $setting->save();

        session()->flash('success', 'تنظیمات با موفقیت ذخیره شد.');
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.settings');
    }
}