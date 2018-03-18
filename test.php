<?php

use Illuminate\Database\Seeder;

class TaxonomiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array_merge(
            $this->colors(),
            $this->washs(),
            $this->grays(),
            $this->textures(),
            $this->fabrics()
        );

        \DB::table('taxonomies')->insert($data);
    }

    private function colorTransFormer($colors, $initial = [])
    {
        return array_reduce($colors, function($carry, $item) {
            $carry[] = [
                'slug' => str_replace('#', '', $item[1]),
                'name' => $item[0],
                'taxonomy' => 'product_color',
                'description' => $item[2]
            ];

            if (isset($item[3])) {
                $carry = $this->colorTransFormer($item[3], $carry);
            }

            return $carry;
        }, $initial);
    }

    private function colors()
    {
        $colors = [
            ['红色', 'red', '', [
                ['粉红', '#ffada2', '即浅红色。别称：妃色、杨妃色、湘妃色、妃红色'],
                ['酡颜', '#ff8864', '饮酒脸红的样子。亦泛指脸红色'],
                ['桃红', '#ff697b', '桃花的颜色，比粉红略鲜润的颜色'],
                ['海棠红', '#ee4462', '淡紫红色、较桃红色深一些，是非常妩媚娇艳的颜色'],
                ['银红', '#ff3a42', '银朱和粉红色颜料配成的颜色。多用来形容有光泽的各种红色，尤指有光泽浅红'],
                ['胭脂', '#ac0227', '女子装扮时用的胭脂的颜色，或国画暗红色颜料'],
                ['绛紫', '#983852', '紫中略带红的颜色'],
                ['茜色', '#de054b', '茜草染的色彩，呈深红色'],
                ['彤色', '#ff3602', '赤色'],
                ['赤色', '#d60006', '本义火的颜色，即红色'],
                ['殷红', '#d10015', '发黑的红色'],
                ['酡红', '#f10000', '像饮酒后脸上泛现的红色，泛指脸红']
            ]],
            ['黄色', 'yellow', '', [
                ['鸭黄', '#f3ff6a', '小鸭毛的黄色'],
                ['鹅黄', '#fdf82c', '淡黄色'],
                ['缃色', '#f6c51b', '浅黄色'],
                ['秋香色', '#dcba00', '浅橄榄色，浅黄绿色'],
                ['橙黄', '#ffa200', '柑橘的黄色'],
                ['杏黄', '#ffa300', '成熟杏子的黄色'],
                ['橘黄', '#ff8000', '柑橘的黄色'],
                ['橘红', '#ff6800', '柑橘皮所呈现的红色'],
                ['琥珀', '#d86200', '琥珀的颜色'],
                ['黄栌', '#ed9b33', '一种落叶灌木，花黄绿色，叶子秋天变成红色。木材黄色可做染料'],
                ['橙色', '#ff8500', '界于红色和黄色之间的混合色'],
                ['姜黄', 'ffc869', '中药名。别名姜黄。为姜科植物姜黄的根茎。又指人脸色不正，呈黄白色']
            ]],
            ['绿色', 'green', '', [
                ['松花色', '#a9ef70', '松树花粉的颜色，亦即是浅黄绿色'],
                ['豆绿', '#86d945', '浅黄绿色'],
                ['柳黄', '#bde600', '像柳树芽那样的浅黄色'],
                ['葱绿', '#80e400', '浅绿又略显微黄的颜色、草木青翠的样子'],
                ['草绿', '#00ea5e', '绿而略黄的颜色'],
                ['葱青', '#00c33f', ''],
                ['油绿', '#00c81d', '光润而浓绿的颜色。以上几种绿色都是明亮可爱的色彩'],
                ['绿沉', '#00921d', '深绿'],
                ['松花绿', '#007d4a', '亦作「松花」、「松绿」。偏黑的深绿色，墨绿'],
                ['松柏绿', '#00ae78', '经冬松柏叶的深绿'],
                ['青碧', '#00c7a6', '鲜艳的青蓝色'],
                ['缥色', '#36f5b0', '绿色而微白']
            ]],
            ['蓝色', 'blue', '', [
                ['水蓝', '#caf1f5', '极浅的蓝色'],
                ['蔚蓝', '#00f8ff', '类似晴朗天空的颜色的一种蓝色'],
                ['碧蓝', '#10f5ed', '青蓝色'],
                ['湖蓝', '#00e3f7', '清澈湖水在阳光下的颜色'],
                ['蓝色', '#00d0fa', '三原色的一种。像晴天天空的颜色'],
                ['群青', '#358db0', '深蓝色'],
                ['靛青', '#007ab3', '也叫「蓝靛」'],
                ['靛蓝', '#00517b', '由靛蓝或菘蓝属植物提取所得到的蓝色染料'],
                ['绀青', '#012c73', '亦叫绀紫，即纯度较低的深紫色'],
                ['藏蓝', '#2b4a80', '蓝里略透红色'],
                ['黛蓝', '#404f67', '深蓝色'],
                ['苍青', '#6a97ad', '灰蓝色']
            ]],
            ['紫色', 'purple', '', [
                ['水红', '#fbcfe6', '浅红略带紫的颜色'],
                ['藕荷色', '#ebc3cf', '浅紫而略带红的颜色'],
                ['藕色', '#f3ced7', '浅灰而略带红的颜色'],
                ['丁香色', '#d89ae3', '紫丁香的颜色，浅浅的紫色，很娇柔淡雅的色彩'],
                ['雪青', '#b79de4', '浅蓝紫色'],
                ['酱紫', '#8b4c75', '紫中略带红的颜色'],
                ['黛紫', '#5d3c66', '深紫色'],
                ['紫棠', '#61004e', '黑红色'],
                ['青莲', '#9200af', '偏蓝的紫色'],
                ['紫色', '#9d2abc', '蓝和红组成的颜色。古人以紫为祥瑞的颜色。代指与帝王、皇宫有关的事物'],
                ['紫酱', '#8a4e61', '浑浊的紫色'],
                ['紫檀', '#521e17', '檀木的颜色，也称乌檀色、乌木色']
            ]],
            ['白色', 'white', '', [
                ['精白', '#ffffff', '又称作纯白，洁白，净白，粉白'],
                ['铅白', '#f0f0f4', '铅粉的白色。铅粉，国画颜料，日久易氧化「返铅」变黑。铅粉在古时用以搽脸的化妆品'],
                ['银白', '#eae6ef', '带银光的白色'],
                ['霜色', '#e7f1f7', '白霜的颜色'],
                ['雪白', '#edfdff', '如雪般洁白'],
                ['莹白', '#defafe', '晶莹洁白'],
                ['月白', '#d1edf1', '淡蓝色'],
                ['素色', '#dbf2e9', '白色，无色'],
                ['荼白', '#f6f8f6', '如荼之白色'],
                ['缟色', '#f3eddd', '白色'],
                ['鱼肚白', '#ffefe7', '似鱼腹部的颜色，多指黎明时东方的天色颜色'],
                ['象牙白', '#fffcf0', '乳白色']
            ]],
            ['黑色', 'black', '', [
                ['黎色', '#77674b', '黑中带黄，似黎草色'],
                ['黧色', '#5f523a', '黑中带黄的颜色'],
                ['象牙黑', '#33241f', '亦属于黑色，但感觉上比一般黑色偏暖'],
                ['玄色', '#6a2415', '赤黑色，黑中带红的颜色'],
                ['缁色', '#4d2f30', '帛黑色'],
                ['黝黑', '#695656', '青黑色，就像是皮肤暴露在太阳光下而晒成的颜色'],
                ['黝色', '#6d6583', '本义为淡黑色或微青黑色'],
                ['乌色', '#785982', '暗而呈黑的颜色'],
                ['乌黑', '#3c2c41', '深黑，如夜间无光时的无法看见四周的颜色'],
                ['玄青', '#3f394f', '深黑色'],
                ['漆黑', '#161723', '非常黑的'],
                ['黑色', '#000000', '纯黑']
            ]]
        ];

        return $this->colorTransFormer($colors);
    }

    private function transFormer($array, $taxonomy)
    {
        return array_reduce($array, function($carry, $item) use($taxonomy) {
            $carry[] = [
                'slug' => str_slug($item[0]),
                'name' => $item[1],
                'taxonomy' => $taxonomy,
                'description' => isset($item[2]) ? $item[2] : null
            ];

            return $carry;
        }, []);
    }

    private function washs()
    {
        $array = ['石磨洗', '漂洗', '普洗', '砂洗', '酵素洗', '雪花洗'];
        return $this->transFormer($array, 'product_wash');
    }

    private function grays()
    {
        $array = [
            ['Taffeta', '平纹'],
            ['Twill', '斜纹'],
            ['Satin', '缎面'],
            ['Lustrine', '绡'],
            ['Jacquard', '提花'],
            ['Burnt-Out', '烂花'],
            ['Pongee', '春亚纺'],
            ['Check', '格子'],
            ['Stripe', '条子'],
            ['Double-Layer', '双层']
        ];
        return $this->transFormer($array, 'product_gray');
    }

    private function textures()
    {
        $array = [
            ['Two-Tone', '印花'],
            ['Embroider', '绣花'],
            ['Applique', '贴花'],
            ['Zhahua', '扎花'],
            ['Zhuhua', '珠花'],
            ['Panhua', '盘花'],
            ['Lamao', '拉毛'],
            ['Surong', '缩绒'],
            ['Xiangpi', '镶皮'],
            ['Fudiao', '浮雕']
        ];
        return $this->transFormer($array, 'product_texture');
    }

    private function fabrics()
    {
        $array = [
            ['Mulberry silk', '桑蚕丝', 'MS'],
            ['Tussah Silk', '柞蚕丝', 'TS'],
            ['Silk', '真丝', 'S'],
            ['Tencel', '天丝', 'Tel'],
            ['Viscose', '人丝', 'V'],
            ['Polyester', '涤纶(聚酯纤维)', 'T'],
            ['Bemberg', '酮氨丝(宾霸)', 'BEM'],
            ['Acetate', '醋酸', ''],
            ['Chiffon', '雪纺', ''],
            ['Georgette', '乔其', ''],
            ['Imitated Silk Fabric', '仿真丝', ''],
            ['Filament', '长丝', ''],
            ['Spun', '短纤', ''],
            ['Black Yarn', '黑丝', ''],
            ['Triangle Profile', '三角异形丝', ''],
            ['Cation', '阳离子', ''],
            ['AIR-JET Texturing Yarn', '气变形丝', ''],
            ['Micro-Fibric', '超细纤维', ''],
            ['Full Drawn Yarn', '全拉伸丝', 'FDY'],
            ['Ppeoriented Yarn', '预取向丝', 'POY'],
            ['Draw Textured Yarn', '拉伸变形丝', 'DTY'],
            ['Drww Twist', '牵伸加捻丝', 'DT'],

            ['Wool', '羊毛', 'W'],
            ['Cashmere', '羊绒', 'WS'],
            ['Lambswool', '羊羔毛', 'LA'],
            ['Alpaca', '羊驼毛', 'AL'],
            ['Camel hair', '驼毛(驼绒)', 'CH'],
            ['Rabbit Hair', '兔毛', 'RH'],
            ['Angora', '安哥拉山羊毛', 'WA'],
            ['Yark Hair', '牦牛毛', 'YH'],
            ['Mohair', '马海毛', 'M'],

            ['Cotton', '棉', 'C'],
            ['Chief Value of Cotton', '涤棉倒比', 'CVC|涤含量低于60％以下'],
            ['Rayon', '人棉', 'R'],
            ['Cupra', '酮氨', 'CUP'],
            ['P/C', '涤棉', ''],

            ['Linen', '亚麻', 'L'],
            ['Hemp', '大麻', 'Hem'],
            ['Jute', '黄麻', 'J'],
            ['Kender', '罗布麻', ''],
            ['Ramine', '苎麻', 'Ram'],

            ['Cupro', '铜', 'CU'],
            ['Nylon', '锦纶(尼龙)', 'N'],
            ['Acrylic', '腈纶', 'A'],
            ['Lycra', '莱卡', 'LY'],
            ['Modal', '莫代尔', 'MD'],
            ['Polyvinyl', '维纶', 'PV'],
            ['Polypropylene', '丙纶', 'PP'],
            ['Silkool', '大豆蛋白纤维', ''],
            ['Spendex', '氨纶', 'SP'],

            ['Koshibo', '花瑶', ''],
            ['Taslon', '塔丝隆', ''],
            ['Strec', '弹力布', ''],
            ['Jeanet', '牛仔布', ''],
            ['Oxford', '牛津布', ''],
            ['Cambric', '帆布', ''],
            ['T/R', '涤捻', ''],
            ['White Stripe', '白条纺', ''],
            ['Black Stripe', '黑条纺', ''],
            ['Empty Stripe', '空齿纺', ''],
            ['Peach Skin', '水洗绒/桃皮绒', ''],
            ['Peach Twill', '卡丹绒', ''],
            ['Peach Moss', '绉绒', ''],
            ['Organdy', '玻璃纱', ''],
        ];

        return $this->transFormer($array, 'product_fabric');
    }
}
