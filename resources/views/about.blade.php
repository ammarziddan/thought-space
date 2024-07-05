@extends('layouts.main')

@section('container')
<div class="mx-5">
    <div class="col-lg-8 p-5">
        <h1 style="font-size: 65px">ThoughtSpace <br>Where Ideas Thrive.</h1>

        <div class="fs-5 mt-5 lh-lg">
            <p>Thought Space is a platform for sharing human stories and ideas. It allows anyone to share insightful perspectives, useful knowledge, and life wisdom with the world—without needing to build a mailing list or a following first. While the internet is often noisy and chaotic, Thought Space offers a quiet yet insightful environment. It's simple, beautiful, and collaborative, helping you find the right audience for your message.</p>

            <p>We believe that what you read and write matters. Words can divide or empower, inspire or discourage. In a world where sensational and shallow stories often dominate, we’re creating a system that values depth, nuance, and meaningful engagement. Thought Space is a place for thoughtful conversations rather than fleeting opinions, emphasizing substance over style.</p>

            <p class="fs-3 lh-sm">Our ultimate goal is to enhance our collective understanding of the world through the power of writing.</p>

            <p>Instead of relying on ads or selling your data, Thought Space is supported by a growing community of members who share our mission. If you're new here, start exploring. Delve into topics that matter to you. Find posts that help you learn something new or reconsider something familiar—and then share your own story.</p>
        </div>
    </div>
</div>
<div class="d-flex flex-column">
    <a href="/" class="text-decoration-none text-dark px-5 border about-link-hover" style="margin-bottom: -1px">
        <p class="my-3">Start reading <i class="bi bi-arrow-right float-end"></i></p>
    </a>
    <a href="/posts/create" class="text-decoration-none text-dark px-5 border about-link-hover">
        <p class="my-3">Start writing <i class="bi bi-arrow-right float-end"></i></p>
    </a>
</div>
@endsection