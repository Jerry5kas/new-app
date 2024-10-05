<?php

namespace App\Livewire\Web\Home;

use Aaran\Blog\Models\BlogTag;
use Aaran\Blog\Models\Post;
use Aaran\Common\Models\Common;
use Aaran\Common\Models\Label;
use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Support\Collection;
use Livewire\Component;

class Blog extends Component
{
    use CommonTraitNew;

    public $BlogCategories;
    public $category_id;
    public $tags;
    public $tagfilter = [];

    #region[blogCategory]
    public $blogcategory_id = '';
    public $blogcategory_name = '';
    public Collection $blogcategoryCollection;
    public $highlightBlogCategory = 0;
    public $blogcategoryTyped = false;

    public function mount()
    {
        $this->BlogCategories = Common::where('label_id','=','17')->get();
    }

    public function decrementBlogcategory(): void
    {
        if ($this->highlightBlogcategory === 0) {
            $this->highlightBlogCategory = count($this->blogcategoryCollection) - 1;
            return;
        }
        $this->highlightBlogcategory--;
    }

    public function incrementBlogcategory(): void
    {
        if ($this->highlightBlogcategory === count($this->blogcategoryCollection) - 1) {
            $this->highlightBlogCategory = 0;
            return;
        }
        $this->highlightBlogcategory++;
    }

    public function setBlogcategory($name, $id): void
    {
        $this->blogcategory_name = $name;
        $this->blogcategory_id = $id;
        $this->getBlogcategoryList();
    }

    public function enterBlogcategory(): void
    {
        $obj = $this->blogcategoryCollection[$this->highlightBlogcategory] ?? null;

        $this->blogcategory_name = '';
        $this->blogcategoryCollection = Collection::empty();
        $this->highlightBlogCategory = 0;

        $this->blogcategory_name = $obj['vname'] ?? '';
        $this->blogcategory_id = $obj['id'] ?? '';
    }

    public function refreshBlogcategory($v): void
    {
        $this->blogcategory_id = $v['id'];
        $this->blogcategory_name = $v['name'];
        $this->blogcategoryTyped = false;
    }

    public function blogcategorySave($name)
    {
        $obj = Common::create([
            'label_id' => 17,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshBlogcategory($v);
    }

    public function getBlogcategoryList(): void
    {
        $this->blogcategoryCollection = $this->blogcategory_name ?
            Common::search(trim($this->blogcategory_name))->where('label_id', '=', '17')->get() :
            Common::where('label_id', '=', '17')->get();
    }

    #endregion

    #region[blogTag]
    public $blogtag_id = '';
    public $blogtag_name = '';
    public Collection $blogtagCollection;
    public $highlightBlogtag = 0;
    public $blogtagTyped = false;

    public function decrementBlogtag(): void
    {
        if ($this->highlightBlogtag === 0) {
            $this->highlightBlogtag = count($this->blogtagCollection) - 1;
            return;
        }
        $this->highlightBlogtag--;
    }

    public function incrementBlogtag(): void
    {
        if ($this->highlightBlogtag === count($this->blogtagCollection) - 1) {
            $this->highlightBlogtag = 0;
            return;
        }
        $this->highlightBlogtag++;
    }

    public function setBlogTag($name, $id): void
    {
        $this->blogtag_name = $name;
        $this->blogtag_id = $id;
        $this->getBlogtagList();
    }

    public function enterBlogtag(): void
    {
        $obj = $this->blogtagCollection[$this->highlightBlogtag] ?? null;

        $this->blogtag_name = '';
        $this->blogtagCollection = Collection::empty();
        $this->highlightBlogtag = 0;

        $this->blogtag_name = $obj['vname'] ?? '';
        $this->blogtag_id = $obj['id'] ?? '';
    }

    public function refreshBlogtag($v): void
    {
        $this->blogtag_id = $v['id'];
        $this->blogtag_name = $v['name'];
        $this->blogtagTyped = false;
    }

    public function blogtagSave($name)
    {
        $obj = BlogTag::create([
            'blogcategory_id' => $this->blogcategory_id,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshBlogTag($v);
    }

    public function getBlogTagList(): void
    {
        $this->blogtagCollection = $this->blogtag_name ?
            BlogTag::search(trim($this->blogtag_name))->where('blogcategory_id', '=', $this->blogcategory_id)->get() :
            BlogTag::where('blogcategory_id', '=', $this->blogcategory_id)->get();
    }

    #endregion

    public function getCategory_id($id)
    {
        $this->category_id = $id;
        $this->gettags();
    }

    public function gettags()
    {
        $this->tags = BlogTag::where('blogcategory_id', '=', $this->category_id)->get();
    }

    public function getFilter($id)
    {
        if (!in_array($id,$this->tagfilter,true)) {
            return array_push($this->tagfilter, $id);
        }
    }

    public function clearFilter()
    {
        $this->tagfilter=[];
    }

    public function removeFilter($id)
    {
        unset($this->tagfilter[$id]);
    }


    #region[Render]
    public function getRoute()
    {
        return route('posts');
    }

    public function render()
    {
//        $this->getBlogData();
        $this->getListForm->perPage=6;
        return view('livewire.web.home.blog')->layout('layouts.web')->with([
            'list' => $this ->getListForm ->getList(Post::class,function ($query){
                return $query->latest()->when($this->tagfilter,function ($query,$tagfilter){
                    return $query->whereIn('blogtag_id',$tagfilter);
                });
            }),
            'firstPost'=>Post::latest()->take(1)->when($this->tagfilter,function ($query,$tagfilter){
                return $query->whereIn('blogtag_id',$tagfilter);
            })->get(),
            'topPost'=>Post::take(4)->when($this->tagfilter,function ($query,$tagfilter){
                return $query->whereIn('blogtag_id',$tagfilter);
            })->get(),
        ]);
    }
}
