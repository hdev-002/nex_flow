<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BusinessSetting;
use Livewire\WithFileUploads;

class BusinessSettings extends Component
{
    use WithFileUploads;

    public $activeTab = 'general';
    public $businessName;
    public $businessEmail;
    public $businessPhone;
    public $businessAddress;
    public $timezone;
    public $dateFormat;
    public $currencySymbol;
    public $defaultLanguage;
    public $lightLogo;
    public $darkLogo;
    public $tempLightLogo;
    public $tempDarkLogo;

    public function mount()
    {
        $this->loadSettings();
    }

    public function loadSettings()
    {
        $settings = BusinessSetting::getSettings();
        $this->businessName = $settings->business_name ?? config('app.name');
        $this->businessEmail = $settings->business_email ?? config('mail.from.address');
        $this->businessPhone = $settings->business_phone;
        $this->businessAddress = $settings->business_address;
        $this->timezone = $settings->timezone ?? config('app.timezone');
        $this->dateFormat = $settings->date_format ?? config('app.date_format', 'Y-m-d');
        $this->currencySymbol = $settings->currency_symbol ?? '$';
        $this->defaultLanguage = $settings->default_language ?? config('app.locale');
        $this->lightLogo = $settings->light_logo;
        $this->darkLogo = $settings->dark_logo;
    }

    public function updatedTempLightLogo()
    {
        try {
            $this->validate([
                'tempLightLogo' => 'required|image|max:1024',
            ]);

            if ($this->tempLightLogo) {
                $filename = $this->tempLightLogo->store('logos', 'public');
                if ($filename) {
                    $this->lightLogo = $filename;
                    if ($this->saveLogo('light_logo', $filename)) {
                        session()->flash('message', 'Light logo updated successfully.');
                    } else {
                        session()->flash('error', 'Failed to save light logo to database.');
                    }
                } else {
                    session()->flash('error', 'Failed to store light logo file.');
                }
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error uploading light logo: ' . $e->getMessage());
        }
    }

    public function updatedTempDarkLogo()
    {
        try {
            $this->validate([
                'tempDarkLogo' => 'required|image|max:1024',
            ]);

            if ($this->tempDarkLogo) {
                $filename = $this->tempDarkLogo->store('logos', 'public');
                if ($filename) {
                    $this->darkLogo = $filename;
                    if ($this->saveLogo('dark_logo', $filename)) {
                        session()->flash('message', 'Dark logo updated successfully.');
                    } else {
                        session()->flash('error', 'Failed to save dark logo to database.');
                    }
                } else {
                    session()->flash('error', 'Failed to store dark logo file.');
                }
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error uploading dark logo: ' . $e->getMessage());
        }
    }

    protected function saveLogo($field, $value)
    {
        try {
            return BusinessSetting::updateSettings([$field => $value]);
        } catch (\Exception $e) {
            session()->flash('error', 'Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function saveGeneralSettings()
    {
        $this->validate([
            'businessName' => 'required|string|max:255',
            'businessEmail' => 'required|email',
            'businessPhone' => 'nullable|string|max:20',
            'businessAddress' => 'nullable|string|max:500',
            'timezone' => 'required|string',
            'dateFormat' => 'required|string',
            'currencySymbol' => 'required|string|max:10',
            'defaultLanguage' => 'required|string',
        ]);

        BusinessSetting::updateSettings([
            'business_name' => $this->businessName,
            'business_email' => $this->businessEmail,
            'business_phone' => $this->businessPhone,
            'business_address' => $this->businessAddress,
            'timezone' => $this->timezone,
            'date_format' => $this->dateFormat,
            'currency_symbol' => $this->currencySymbol,
            'default_language' => $this->defaultLanguage,
        ]);

        session()->flash('message', 'General settings updated successfully.');
    }

    public function saveLocalizationSettings()
    {
        $this->validate([
            'businessName' => 'required|string|max:255',
            'businessEmail' => 'required|email',
            'timezone' => 'required|string',
            'dateFormat' => 'required|string',
            'currencySymbol' => 'required|string|max:10',
            'defaultLanguage' => 'required|string',
        ]);

        BusinessSetting::updateSettings([
            'business_name' => $this->businessName,
            'business_email' => $this->businessEmail,
            'timezone' => $this->timezone,
            'date_format' => $this->dateFormat,
            'currency_symbol' => $this->currencySymbol,
            'default_language' => $this->defaultLanguage,
        ]);

        session()->flash('message', 'Localization settings updated successfully.');
    }

    public function render()
    {
        return view('livewire.business-settings')->layout('layouts.app');
    }
}