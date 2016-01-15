<?php
/**
 * @Author: [DuCen] <316358726@qq.com>
 * @Date:   2015-12-29 17:30:55
 * @Last Modified by:   [DuCen] <316358726@qq.com>
 * @Last Modified time: 2015-12-31 16:38:32
 */

/**
 * [render 返回json数据]
 * @param  [type] $code    [错误10091 正确10020,参数没有 10021]
 * @param  [type] $message [描述信息]
 * @param  string $result  [返回数据]
 * @return [type]          [json数据类型]
 */
function render($code,$message,$result =''){
	if(is_array($result))
	{
		foreach ((array) $result as $name => $data)
		{
			if(is_array($data))
			{
				foreach ((array) $data as $k => $v) {
					if($v==''){continue;}
					$result[$name][$k] = $v;
				}
			}
		}
	}
	header('Content-type: application/json');
	echo json_encode(array(
			'code'=>$code,
			'message'=>$message,
			'result' =>$result
	));

}