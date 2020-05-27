<?php $__env->startSection('content'); ?>
    <div class="container-fluid justify-content-left">
        <div class="row justify-content-left">
            <div class="col-md-8 post-single">
                <div class="SinglePostIt p-3">
                    <h3 class="title"><?php echo e($post->title); ?></h3>
                    <?php echo $post->content; ?>

                    <span class="publishdatum"> Gepubliceerd op <?php echo e($post->published_at ?? "--"); ?></span>
                    <?php if(auth()->guard()->check()): ?>
                        <div class="postbutton">
                            <?php if(!$post->published_at && Auth::user()->can('publish',$post)): ?>
                            <button class="btn btn-success" id="Publishbutton" onclick="event.preventDefault(); document.getElementById('publish-post-form').submit();">
                            Publish
                            </button>
                            <form id="publish-post-form" action="/posts/<?php echo e($post->id); ?>/publish" method="POST" style="display:none;">
                            <?php echo csrf_field(); ?>;
                            </form>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$post)): ?>
                            <a href="/posts/<?php echo e($post->id); ?>/edit" id="btn-edit" class="btn btn-primary">
                                Edit
                            </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col md-4 picture-wall">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="container-fluid justify-content-left ">
            <div class="row justify-content-left ">
                <div class="col-md-6 post-single ">
                    <div class="reactions">
                        <br/>
                        <h3 class="comment-list">COMMENTS</h3>
                        <hr/>
                        <?php $__currentLoopData = $post->reactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="reaction">
                            <div class="row">
                                <div class="col-sm-2 mr-4">
                                    <img src="../../images/boy.png" alt="Your Profile Image" class="profiel-plaatje rounded-circle">
                                </div>
                                <div class="col-sm-9">
                                    <span class="username"><?php echo e($reaction->author->name); ?></span> <span class="reactioncreated"> &equiv; <?php echo e($reaction->created_at->format('D, d M Y  H:m')); ?> </span><br/>
                                    <span class="comment-tekst"><?php echo e($reaction->content); ?></span><br/>
                                    <div class="reaction-buttons">
                                        <?php if($reaction->user_id == Auth::id()): ?>
                                        <div class="single_comment_buttons" id="single_comments_<?php echo e($reaction->id); ?>">
                                            <button id="butt_comment_edit" data-id="<?php echo e($reaction->id); ?>" class="btn btn-primary" onclick="event.preventDefault();
                                            document.getElementById('single_comments_<?php echo e($reaction->id); ?>').style.float = 'none';
                                            document.getElementById('form_comment_edit_<?php echo e($reaction->id); ?>').style.display = 'block'">
                                            Edit
                                            </button>
                                            <form action="/reaction/<?php echo e($reaction->id); ?>" method="post" id="form_comment_edit_<?php echo e($reaction->id); ?>" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('put'); ?>
                                            <div class="form-group">
                                                <label for="txtContent"></label>
                                                <textarea class="form-control" name="txtEditContent" id="txtEditContent" rows="5"> <?php echo e($reaction->content); ?></textarea>
                                            </div>
                                            <button type="submit" id="saveedit" class="btn btn-primary">
                                            Save
                                            </button>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete',$reaction)): ?>
                                            </form>
                                            <button class="btn btn-danger" id="delrea" onclick="event.preventDefault(); document.getElementById('delete-reaction-form').submit();">
                                            Delete
                                            </button>
                                            <form id="delete-reaction-form" action="/reaction/<?php echo e($reaction->id); ?>" method="post" style="display: none">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            </form>
                                        </div>
                                            <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                    <div class="col-md-6 post-single ">
                        <div class="reactions">
                            <?php if(auth()->guard()->check()): ?>
                            <br/>
                            <h3 class="reaction-title">LEAVE A REPLY</h3>
                            <hr/>
                            <form action="/posts/<?php echo e($post->id); ?>/reaction" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="txtReaction">Comment</label>
                                <textarea class="form-control" name="txtReaction" id="txtReaction" rows="18"></textarea>
                            </div>
                                <button type="submit" class="btn btn-primary">Submit Comment</button>
                                <br/>
                                <br/>
                                </form>
                    </div>
                </div>
            </div>
        </div>

                <?php else: ?>
                <br/>
                <h3 class="reaction-title">LEAVE A REPLY</h3>
                <hr/>
            <div class="alert alert-danger" role="alert">
                <strong>Log in om een reactie te plaatsen... </strong>
                <a id="btn-comment-login" class="btn btn-primary pull-right" href="/login" role="button">Login</a>
            </div>

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/blog/resources/views/posts/single.blade.php ENDPATH**/ ?>