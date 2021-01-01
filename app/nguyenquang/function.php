<?php

function stripUnicode($str){
	if(!$str) return false;
	$unicode = array(
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
		'd'=>'đ|Đ',
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		'i'=>'í|ì|ỉ|ĩ|ị',
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
	);
	foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
	return $str;
}
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

// Đệ quy danh mục :
function categoryMulti($data, $parent_id=0, $str="", $selected = 0)
{
	foreach($data as $value)
	{
		$id = $value['id'];
		$title = $value['title'];

		if($value['parent_id']==$parent_id)
		{
			if($selected != 0 && $id==$selected)
			{
				?>
				<option id="<?php echo $id ?>" value="<?php echo $id ?>" selected><?php echo $str." ".$title ?></option>
				<?php
			}
			else
			{
				?>
				<option id="<?php echo $id ?>" value="<?php echo $id ?>"><?php echo $str." ".$title ?></option>
				<?php
			}
			categoryMulti($data, $id, $str."---|", $selected);
		}
	}
}

// Đệ quy danh sách danh muc bai viet ( List category post ) :

function categoryListMulti($data, $parent_id=0, $str="")
{
	foreach($data as $key => $value)
	{
		$id = $value['id'];
		$title = $value['title'];

		if($value['parent_id']==$parent_id)
		{
			?>
			<tr>
				<td>
                    <div class="icheckbox_square-green" style="position: relative;">
                        <input type="checkbox" class="i-checks checkbox-primary" name="checkcategory[]" value="" style="position: absolute; opacity: 0;">
                    </div>
                    <?php if($value['status']==1){ ?>
                        <span>
							<a href="<?php echo route('categories.post_hidden', ['id'=>$value['id']]) ?>">
								<img class="" src="<?php echo URL::asset('public/nguyenquang_admin/img/icons/Icon_GreenDot.png') ?>" alt="">
							</a>
						</span>
                        <?php
                    }else{
                        ?>
                        <span>
							<a href="<?php echo route('categories.post_display', ['id'=>$value['id']]) ?>">
								<img class="" src="<?php echo URL::asset('public/nguyenquang_admin/img/icons/Icon_YellowDot.png') ?>" alt="">
							</a>
						</span>
                        <?php
                    }
                    ?>
                    <a href=""><?php echo $str." ".$value['title'] ?></a>
                </td>
				<td>
					<span>
						<a id="<?php echo $id; ?>" data-toggle="modal" data-target="#myModalEdit" class="btn btn-warning btn-xs categoryEdit"><i class="fas fa-edit"></i></a>
					</span>
					<span onclick="return mydelete()">
						<form action="<?php echo route('categories.destroy', ['id'=>$value['id']]) ?>" method="POST" style="display: inline;">
							<input type="hidden" name="_token" id="csrf-token" value="<?php echo Session::token() ?>" />
							<button type="submit" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
						</form>
					</span>
				</td>
			</tr>
			<?php
			categoryListMulti($data, $id, $str."---|");
		}
	}
}


// Hiển thị danh mục bài viết ( Thêm mới ) :
function listcategorypost($data, $parent_id=0, $str="")
{
	foreach($data as $value)
	{
		$id = $value['id'];
		$title = $value['title'];
		if($value['parent_id']==$parent_id)
		{
			?>
			<span><?php echo $str; ?>
			<input type="checkbox" value=<?php echo $id; ?> name="category[]"><?php echo $title; ?></span>
			<br>
			<?php
			listcategorypost($data, $id, $str."---|");
		}
	}
}


// Hiểm thị danh mục khi sửa bài viết :
function categorypost_edit($data, $parent_id =0, $cateedit, $str="")
{
	foreach($data as $value)
	{
		$id = $value['id'];
		$title = $value['title'];
		$dem = 0;

		if($value['parent_id']==$parent_id)
		{
			foreach($cateedit as $cate)
			{
				if($cate['category_id']==$id)
				{
					$dem++;

				}
			}
			if($dem==1)
			{
				?>
				<span><?php echo $str; ?>
				<input type="checkbox" checked value=<?php echo $id; ?> name="category[]"><?php echo $title; ?></span>
				<br>
				<?php
			}
			else
			{
				?>
				<span><?php echo $str; ?>
				<input type="checkbox" value=<?php echo $id; ?> name="category[]"><?php echo $title; ?></span>
				<br>
				<?php

			}
			categorypost_edit($data, $id, $cateedit, $str."---|");
		}
	}
}


//  Checkbox category edit post :

function CheckboxMulti_Post($data, $parent_id =0, $str="", $selected=0)
{
	foreach($data as $value)
	{
		$id = $value['id'];
		$title = $value['title'];

		if($value['parent_id']==$parent_id)
		{
			if($selected != 0 && $id==$selected)
			{
				?>
				<option value="<?php echo $id ?>" selected><?php echo $str." ".$title ?></option>
				<?php
			}
			else
			{
				?>
				<option value="<?php echo $id ?>"><?php echo $str." ".$title ?></option>
				<?php
			}
			CheckboxMulti_Post($data, $id, $str."---|", $selected);
		}
	}
}


//  Checkbox category edit post

function CheckboxMulti_EditPost($data, $parent_id =0, $cateedit, $str="")
{
	foreach($data as $value)
	{
		$id = $value['id'];
		$title = $value['title'];
		$dem = 0;

		if($value['parent_id']==$parent_id)
		{
			foreach($cateedit as $cate)
			{
				if($cate['category_id']==$id)
				{
					$dem++;

				}
			}
			if($dem==1)
			{
				?>
				<option value="<?php echo $id ?>" selected><?php echo $str." ".$title ?></option>
				<br>
				<?php
			}
			else
			{
				?>
				<option value="<?php echo $id ?>"><?php echo $str." ".$title ?></option>
				<br>
				<?php

			}
			CheckboxMulti_EditPost($data, $id, $cateedit, $str."---|");
		}
	}
}


    /* Author: quangnd
     * Action : Checkbox category products
     * Date: 2019
     */
function CheckboxMulti_Product($data, $str="")
{
    if(!empty($data)){
        foreach($data as $value)
        {
            $id = $value['id'];
            $title = $value['title'];
            ?>
            <option value="<?php echo !empty($id)?$id:'' ?>"><?php echo $str." ".!empty($title)?$title:'' ?></option>
            <?php
        }
    }
}


// Danh mục sản phẩm :
// Đệ quy danh sách danh muc bai viet ( List category post ) :

function Cateproduct_List($data, $parent_id=0, $str="")
{
	foreach($data as $key => $value)
	{
		$id = $value['id'];
		$name = $value['name'];

		if($value['parent_id']==$parent_id)
		{
			?>
			<tr>
				<td>
					<input type="checkbox" name="checkitem[]" id="checkitem" value="<?php echo $value['id'] ?>">
					<?php
					if($value['status']==1)
					{
						?>
						<span>
							<a href="<?php echo route('categoryproducts.hidden', ['id'=>$value['id']]) ?>">
								<img width="12px"
								src="<?php echo URL::asset('public/nguyenquang_admin/img/icons/glossy-green-icon-button-md.png') ?>"
								alt="">
							</a>
						</span>
						<?php
					}
					else {
						?>
						<span>
							<a href="<?php  echo route('categoryproducts.show', ['id'=>$value['id']]) ?>">
								<img width="12px"
								src="<?php echo URL::asset('public/nguyenquang_admin/img/icons/full.png') ?>"
								alt="">
							</a>
						</span>
						<?php
					}
					?>
				</td>
				<td class="image-products">
					<?php
						if(!empty($value['image']) && $value['image']!='')
						{
							?>
				<img class="img-responsive img-product" width="100%" src="<?php echo url('public/uploads/'.$value['image']) ?>" alt=" h.anh">
							<?php
						}
						else
						{
							?>
				<img class="img-responsive img-product" width="100%" src="<?php echo url('public/img/no-image-news.png') ?>" alt=" h.anh">
							<?php
						}
					 ?>



				</td>
				<td>
					<a id="<?php echo $value['id'] ?>" data-toggle="modal" data-target="#myModal" href="" class="categoryProductDetail" href=""><?php echo $str." ".$value['name'] ?></a></td>
				<td></td>
				<td><?php echo date('d-m-Y', strtotime($value['created_at'])) ?></td>
				<td>
					<span>
						<a id="<?php echo $value['id'] ?>" data-toggle="modal" data-target="#myModal" href="" class="btn btn-primary categoryProductDetail"><i class="icon-eye-open"></i></a>
					</span>
					<span>
						<a href="<?php echo route('categoryproducts.edit', ['id'=>$value['id']]) ?>" class="btn btn-warning"><i class="icon-edit"></i></a>
					</span>
					<span onclick="return mydelete()">
						<form action="<?php echo route('categoryproducts.destroy', ['id'=>$value['id']]) ?>" method="POST" style="display: inline;">
							<input type="hidden" name="_token" id="csrf-token" value="<?php echo Session::token() ?>" />
							<button type="submit" class="btn btn-danger"><i class="icon-remove"></i></button>
						</form>
					</span>
				</td>
			</tr>
			<?php
			Cateproduct_List($data, $id, $str."---|");
		}
	}
}
// Danh mục Sản phẩm  select option
// Đệ quy danh mục :
function categoryproductMulti($data, $parent_id=0, $str="", $selected = 0)
{
	foreach($data as $value)
	{
		$id = $value['id'];
		$name = $value['name'];

		if($value['parent_id']==$parent_id)
		{
			if($selected != 0 && $id==$selected)
			{
				?>
				<option value="<?php echo $id ?>" selected><?php echo $str." ".$name ?></option>
				<?php
			}
			else
			{
				?>
				<option value="<?php echo $id ?>"><?php echo $str." ".$name ?></option>
				<?php
			}
			categoryproductMulti($data, $id, $str."---|", $selected);
		}
	}
}

//  Checkbox category edit product :

function CheckboxMulti_EditProduct($data, $cateedit, $str="")
{
	foreach($data as $value)
	{
		$id = $value['id'];
		$title = $value['title'];
		$dem = 0;
			foreach($cateedit as $cate)
			{
				if($cate['categoryproduct_id']==$id)
				{
					$dem++;
				}
			}
			if($dem==1)
			{
				?>
				<option value="<?php echo $id ?>" selected><?php echo $str." ".$title ?></option>
				<br>
				<?php
			}
			else
			{
				?>
				<option value="<?php echo $id ?>"><?php echo $str." ".$title ?></option>
				<br>
				<?php

			}
	}
}


//  Checkbox products type
function Multi_Product_type($data)
{

	foreach($data as $value)
	{
		$id = $value['id'];
		$title = $value['name'];

		?>
		<option value="<?php echo $id ?>"><?php echo $title ?></option>
		<?php
		Multi_Product_type($data);
	}
}

/* Author: quangnd
 * Action : Multi category
 * Date: 16/2/2020
 */
function CategorySub($data, $parent_id=0, $str="", $selected = 0)
{
    foreach($data as $value)
    {
        $id = !empty($value['id'])?$value['id']:'';
        $title = !empty($value['title'])?$value['title']:'';
        $type = !empty($value['type'])?$value['type']:'';

        if($value['parent_id']==$parent_id)
        {
            if($selected != 0 && $id==$selected)
            {
                ?>
                <option value="<?php echo $id ?>" selected><?php echo $str." ".$title ?></option>
                <?php
            }
            else
            {
                ?>
                <option value="<?php echo $id ?>"><?php echo $str." ".$title ?></option>
                <?php
            }
            CategorySub($data, $id, $str."---|", $selected);
        }
    }
}

/* Author: quangnd
 * Action : Multi category
 * Date: 16/2/2020
 */
function ListCategorySub($data, $parent_id=0, $str="", $selected = 0)
{
    foreach($data as $value)
    {
        $id = !empty($value['id'])?$value['id']:'';
        $title = !empty($value['title'])?$value['title']:'';
        $type = !empty($value['type'])?$value['type']:'';
        $status = !empty($value['status'])?$value['status']:'';
        $type = !empty($value['type'])?$value['type']:'';
        $image = !empty($value['desktopIcon'])?$value['desktopIcon']:'';
        $dataType = DB::table('datatypes')->select('*')->where('code', $type)->first();

        if($value['parent_id']==$parent_id)
        {
            ?>
                <div class="item">
                    <div class="info pull-left">
                        <div class="icheckbox_square-green" style="position: relative;">
                            <input type="checkbox" class="i-checks checkbox-primary checkitem" name="checkitem[]" value="<?php echo !empty($id)?$id:'' ?>">
                        </div>
                        <span class="status">
                            <?php
                            if($status==1){
                                ?>
                                <a href="<?php echo route('categories.changeStatus', ['id'=>$id]) ?>" title="Hiện thị"><img src="<?php echo URL::asset('uploads/icon/Icon_GreenDot.png')?>" alt=""></a>
                                <?php
                            }else {
                                ?>
                                <a href="<?php echo route('categories.changeStatus', ['id'=>$id]) ?>" title="Hiện thị"><img src="<?php echo URL::asset('uploads/icon/Icon_YellowDot.png')?>" alt=""></a>
                                <?php
                            }
                            ?>
                        </span>
                        <?php 
                        	if(!empty($image)){
                        		?>
                        		<span><img width="25px" height="25px" src="<?php echo URL::asset('uploads/category/'.$image) ?>"></span>
                        		<?php
                        	}
                        ?>
                        <span class="title"><a href="" data-toggle="modal" data-target="#editCategory" id="<?php echo $id; ?>" class="editCate" title="<?php echo $title ?>"><?php echo $str." ".$title ?></a></span>
                    </div>
                    <div class="action pull-right">
                        <span class="type"><?php echo  !empty($dataType->title)?$dataType->title:''; ?></span>
                        <span class="action-btn">
                            <a data-toggle="modal" data-target="#addChildCategory" class="btn btn-xs btn-primary btnChildCategory" title="Thêm" id="<?php echo $id; ?>" ><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <a data-toggle="modal" data-target="#editCategory" id="<?php echo $id; ?>" class="btn btn-xs btn-info btnEditCate" title="Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a onclick="popupYesNoDelete(<?php echo $id ?>);" class="btn btn-xs btn-danger" title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                         </span>
                    </div>
                </div>
                <?php
            ListCategorySub($data, $id, $str."---|", $selected);
        }
    }
}

//  Checkbox category course  :
	function CheckboxMulti_Course($data, $parent_id =0, $str="", $selected=0)
	{
		foreach($data as $value)
		{
			$id = $value['id'];
			$title = $value['title'];

			if($value['parent_id']==$parent_id)
			{
				if($selected != 0 && $id==$selected)
				{
					?>
					<option value="<?php echo $id ?>" selected><?php echo $str." ".$title ?></option>
					<?php
				}
				else
				{
					?>
					<option value="<?php echo $id ?>"><?php echo $str." ".$title ?></option>
					<?php
				}
				CheckboxMulti_Course($data, $id, $str."---|", $selected);
			}
		}
	}


	function CheckboxMulti_EditCourse($data, $parent_id =0, $cateedit, $str="")
{
	foreach($data as $value)
	{
		$id = $value['id'];
		$title = $value['title'];
		$dem = 0;

		if($value['parent_id']==$parent_id)
		{
			foreach($cateedit as $cate)
			{
				if($cate['category_id']==$id)
				{
					$dem++;

				}
			}
			if($dem==1)
			{
				?>
				<option value="<?php echo $id ?>" selected><?php echo $str." ".$title ?></option>
				<br>
				<?php
			}
			else
			{
				?>
				<option value="<?php echo $id ?>"><?php echo $str." ".$title ?></option>
				<br>
				<?php

			}
			CheckboxMulti_EditCourse($data, $id, $cateedit, $str."---|");
		}
	}
}


/* Author: quangnd
 * Action : Multi category
 * Date: 16/2/2020
 */
function listComment($data, $parent_id=0, $str="", $selected = 0)
{
    foreach($data as $value)
    {
        $id = !empty($value['id'])?$value['id']:'';
        $contentCmt = !empty($value['contentCmt'])?$value['contentCmt']:'';
        $status = !empty($value['status'])?$value['status']:'';
        if($value['parent_id']==$parent_id)
        {
            ?>
            <div class="item-cmt <?php echo $str; ?>">
                <div class="user-info">
                    <div class="avatar"><img width="45px" height="45px" src="<?php echo URL::asset('uploads/user/'.$value['user']['avatar']);  ?>" alt="<?php echo $value['user']['avatar']; ?>"></div>
                    <div class="name-time">
                        <div class="name-acc"><?php echo !empty($value['user']['fullname'])?$value['user']['fullname']:'Đang cập nhật' ?> <span class="text-cmt"><?php echo $contentCmt; ?></span></div>
                        <div class="createTime"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo !empty($value['created_at'])?date('d/m/Y H:i', strtotime($value['created_at'])):'Đang cập nhật'; ?></div>
                        <div class="reply-like">
                            <div class="like"><a href=""><i class="fa fa-thumbs-up" aria-hidden="true"></i> Thích</a></div>
                            <div class="reply"><a href="javascript:;">Trả lời</a></div>
                            <article class="form-reply" style="display: none;">
                                <form id="frmRepllyComment" method="POST" enctype="multipart/form-data">
                                    <?php  echo csrf_field() ?>
                                    <div class="form-group">
                                        <input class="form-control" name="contentCmt" id="" cols="30" rows="3" placeholder="Nhập nội dung thảo luận"></input>
                                    </div>
                                    <div class="form-group hidden">
                                        <input class="form-control" name="teacher_id" id="" value="<?php echo !empty($value['teacher_id'])?$value['teacher_id']:0 ?>"></input>
                                    </div>
                                    <div class="form-group hidden">
                                        <input class="form-control" name="course_id" id="" value="<?php echo !empty($value['course_id'])?$value['course_id']:0 ?>"></input>
                                    </div>
                                    <div class="form-group hidden">
                                        <input class="form-control" name="parent_id" id="" value="<?php echo !empty($value['id'])?$value['id']:0 ?>"></input>
                                    </div>
                                    <a id="<?php echo !empty($value['lesson_id'])?$value['lesson_id']:0 ?>" class="btn btn-default btn-info btnCommentReplly">Gửi thảo luận</a>
                                </form>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            listComment($data, $id, $str."repply", $selected);
        }
    }
}

	
?>
