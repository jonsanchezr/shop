<?php

namespace Tests\Unit;

use App\Models\SettingTopcategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class SettingTopcategoryTest extends TestCase
{
    private SettingTopcategory $settingTopcategory;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->settingTopcategory = new SettingTopcategory();
        $this->settingTopcategory->category_id = 1;
    }

    /** @test */
    public function setting_top_categories_belongs_to_category()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->settingTopcategory->category());
        $this->assertInstanceOf(Category::class, $this->settingTopcategory->category()->getModel());
    }
}
