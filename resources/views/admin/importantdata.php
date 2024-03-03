    public function add_blogs(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'blog_image' => 'required',
        ]);

        if ($request->hasFile('blog_image')) {
            $filedata = $request->File('blog_image');
            $filename = time() . $filedata->getClientOriginalName();
            $img = \Image::make($filedata);
            $img->save(\public_path('blogs/' . str_replace(' ', '', $filename)), 50);
        }

        $data = [
            'titile' => ucfirst($request->blog_title),
            'short_description' => $request->short_description,
            'long_description' => $request->description,
            'image' => str_replace(' ', '', $filename),
            'added_date' => date('Y-m-d')
        ];

        insert('blogs', $data);
        return redirect()->back()->with(['blog_added' => 'Blog added successfully']);
    }