<?php

namespace Modules\Footer\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Footer\Entities\Footer;
use Modules\Footer\Http\Requests\CreateFooterRequest;
use Modules\Footer\Http\Requests\UpdateFooterRequest;
use Modules\Footer\Repositories\FooterRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class FooterController extends AdminBaseController
{
    /**
     * @var FooterRepository
     */
    private $footer;

    public function __construct(FooterRepository $footer)
    {
        parent::__construct();

        $this->footer = $footer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$footers = $this->footer->all();

        return view('footer::admin.footers.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('footer::admin.footers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFooterRequest $request
     * @return Response
     */
    public function store(CreateFooterRequest $request)
    {
        $this->footer->create($request->all());

        return redirect()->route('admin.footer.footer.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('footer::footers.title.footers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Footer $footer
     * @return Response
     */
    public function edit(Footer $footer)
    {
        return view('footer::admin.footers.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Footer $footer
     * @param  UpdateFooterRequest $request
     * @return Response
     */
    public function update(Footer $footer, UpdateFooterRequest $request)
    {
        $this->footer->update($footer, $request->all());

        return redirect()->route('admin.footer.footer.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('footer::footers.title.footers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Footer $footer
     * @return Response
     */
    public function destroy(Footer $footer)
    {
        $this->footer->destroy($footer);

        return redirect()->route('admin.footer.footer.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('footer::footers.title.footers')]));
    }
}
