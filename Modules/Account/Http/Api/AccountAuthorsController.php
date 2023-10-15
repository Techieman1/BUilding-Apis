<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Author\Entities\Author;
use Modules\Author\Http\Requests\FrontSaveAuthorRequest;
use Modules\Files\Entities\Files;
use DB;

class AccountAuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authors = Author::where('user_id', auth()->user()->id)
            ->withoutGlobalScope('active')
            ->latest()
            ->paginate(10);

        return response()->json(compact('authors'), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!setting('enable_ebook_upload')) {
            return response()->json(['message' => 'Ebook upload not enabled'], 400);
        }
        if (!auth()->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return response()->json(['message' => 'Create author form'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Ebook\Http\Requests\StoreEbookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FrontSaveAuthorRequest $request)
    {
        $user_id = auth()->user()->id;
        $data = [
            'name' => $request->name,
            'description' => strip_tags($request->description),
            'is_active' => 1,
            'is_verified' => 0,
            'user_id' => $user_id,
        ];

        $author = Author::create($data);
        if ($request->hasFile('author_image')) {
            $file_image = $request->file('author_image');
            $path_image = Storage::putFile('media', $file_image);
            $author_image = Files::create([
                'user_id' => $user_id,
                'disk' => config('filesystems.default'),
                'filename' => $file_image->getClientOriginalName(),
                'path' => $path_image,
                'extension' => $file_image->guessClientExtension() ?? '',
                'mime' => $file_image->getClientMimeType(),
                'size' => $file_image->getSize(),
            ]);
            DB::table('entity_files')->insert([
                'files_id' => $author_image->id,
                'entity_type' => 'Modules\Author\Entities\Author',
                'entity_id' => $author->id,
                'zone' => 'author_image',
                'created_at' => $author_image->created_at,
                'updated_at' => $author_image->updated_at,
            ]);
        }
        return response()->json(['message' => 'Author created successfully'], 201);
    }

    /**
     * Show the form for edit resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $author = Author::with([
            'files'
        ])->withoutGlobalScope('active')->where(['id' => $id, 'user_id' => auth()->user()->id])->firstOrFail();

        return response()->json(['author' => $author], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, FrontSaveAuthorRequest $request)
    {
        $user_id = auth()->user()->id;
        $author = Author::where(['user_id' => $user_id])->findOrFail($id);

        $author->name = $request->name;
        $author->slug = $request->slug;
        $author->description = strip_tags($request->description);
        $author->save();
        if ($request->hasFile('author_image')) {
            $file_image = $request->file('author_image');
            $path_image = Storage::putFile('media', $file_image);
            $author_image = Files::create([
                'user_id' => $user_id,
                'disk' => config('filesystems.default'),
                'filename' => $file_image->getClientOriginalName(),
                'path' => $path_image,
                'extension' => $file_image->guessClientExtension() ?? '',
                'mime' => $file_image->getClientMimeType(),
                'size' => $file_image->getSize(),
            ]);
            DB::table('entity_files')->insert([
                'files_id' => $author_image->id,
                'entity_type' => 'Modules\Author\Entities\Author',
                'entity_id' => $author->id,
                'zone' => 'author_image',
                'created_at' => $author_image->created_at,
                'updated_at' => $author_image->updated_at,
            ]);
        }
        return response()->json(['message' => 'Author updated successfully'], 200);
    }
}
