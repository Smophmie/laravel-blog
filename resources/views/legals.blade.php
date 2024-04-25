@include("layouts.front.head")
@include("layouts.front.header")

    <div class="m-3 flex flex-col items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10">
        {!! $title !!}
        {!! $content !!}
    </div>

@include("layouts.front.footer")
                